var select = document.getElementById("roomtype");
let selectTwo = document.getElementById("SuiteType");
let suiteSelectLabel = document.getElementById("suite-label");
function myfunc() {
  selectTwo.setAttribute("disabled", "disabled");
  selectTwo.classList.add("d-none");
  suiteSelectLabel.classList.add("d-none");
  var value = select.value;
  if (value == "suite") {
    selectTwo.removeAttribute("disabled", "disabled");
    selectTwo.classList.remove("d-none");
    suiteSelectLabel.classList.remove("d-none");
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
}
  
