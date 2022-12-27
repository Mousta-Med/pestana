var select = document.getElementById("roomtype");
select.addEventListener("change", function () {
  console.log('msldjfs');
  var value = select.value;
  if (value == "suite") {
    // document.getElementById("guestSection").innerHTML = "";
    document.getElementById("SuiteType").innerHTML = `
        <label for="suitetype">Suite Type</label>
        <select class="suitetype form-control" name="suitetype" required>
        <option value="standard">Standard</option>
        <option value="junior">Junior</option>
        <option value="presidential">Presidential</option>
        <option value="penthouse">Penthouse</option>
        <option value="honeymoon">Honeymoon</option>
        <option value="bridal">Bridal</option>
        </select>`;
    document.getElementById("nbpersonne").innerHTML = `
        <label for="guests">Number of guests:</label>
        <select id="guests" name="guests">
        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        </select>`;
    var guests = document.getElementById("guests");
    guests.addEventListener("change", function () {
      document.getElementById("guestSection").innerHTML = "";
      let value = Number(guests.value);
      if (value > 0) {
        let i = 1;
        while (i <= value) {
          document.getElementById("guestSection").innerHTML += `
                      <label>Guest First Name ${i} :</label>
                      <input type="text" name="guestfname">
                      <label>Guest Last Name ${i} :</label>
                      <input type="text" name="guestlname">
                      <label for="dob">Guest Date of birth ${i} :</label>
                      <input type="date" id="dob" name="dob" min="1950-01-01" max="2000-01-01">`;
          i++;
        }
      } else {
        document.getElementById("guestSection").innerHTML = "";
      }
    });
  } else if (value == "double") {
    document.getElementById("SuiteType").innerHTML = "";
    document.getElementById("nbpersonne").innerHTML = "";
    document.getElementById("guestSection").innerHTML = `
        <label>Guest First Name :</label>
        <input type="text" name="guestfname">
        <label>Guest Last Name :</label>
        <input type="text" name="guestlname">
        <label for="dob">Guest Date of birth :</label>
        <input type="date" id="dob" name="dob" min="1950-01-01" max="2000-01-01">`;
  } else {
    document.getElementById("SuiteType").innerHTML = "";
    document.getElementById("nbpersonne").innerHTML = "";
    document.getElementById("guestSection").innerHTML = "";
  }

});
