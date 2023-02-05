var select = document.getElementById("roomtype");
let selectTwo = document.getElementById("SuiteType");
let suiteSelectLabel = document.getElementById("suite-label");
let nbpersonne = document.getElementById("nbpersonne");
let guests = document.querySelector(".guests");
let guestForm = document.querySelector(".guests-form");
function myfunc() {
  selectTwo.setAttribute("disabled", "disabled");
  selectTwo.classList.add("d-none");
  suiteSelectLabel.classList.add("d-none");
  var value = select.value;
  if (value == "suite") {
    selectTwo.removeAttribute("disabled", "disabled");
    selectTwo.classList.remove("d-none");
    suiteSelectLabel.classList.remove("d-none");
    document.getElementById("image").remove();
  } else {
    guests.classList.add("d-none");
  }

  select.addEventListener("change", function () {
    var value = select.value;
    if (value == "suite") {
      selectTwo.removeAttribute("disabled", "disabled");
      selectTwo.classList.remove("d-none");
      suiteSelectLabel.classList.remove("d-none");
    } else {
      selectTwo.setAttribute("disabled", "disabled");
      selectTwo.classList.add("d-none");
      suiteSelectLabel.classList.add("d-none");
    }
  });

  nbpersonne.addEventListener("change", function () {
    let value = nbpersonne.value;
    guestForm.innerHTML = "";
    if (value > 0) {
      let i = 1;
      while (i <= value) {
        guestForm.innerHTML += `
          <div class="col"> 
            <label>Guest Name ${i} :</label>
            <input type="text" name="guestname${i}" required>
            <label for="dob">Guest Date of birth ${i} :</label>
            <input type="date" id="dob" name="dob${i}" min="1950-01-01" max="2003-01-01" required> 
          </div>`;
        i++;
      }
    }
  });
}
if (checkin) {
  var currentDate = new Date().toISOString().slice(0, 10);
  let checkin = document.querySelector("#checkin");
  let checkout = document.querySelector("#checkout");
  checkin.setAttribute("min", currentDate);
  checkout.setAttribute("min", currentDate);
  checkin.addEventListener("change", (e) => {
    checkout.setAttribute("min", e.target.value);
  });
}
