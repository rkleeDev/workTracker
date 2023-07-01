//global variables
let submitBtn;
let stopBtn;
let stopDiv;
let timeSpan;
let taskSpan;
let description;
let seconds;
let dateTotal = 0;
let lastUsedDay = 0;

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
let yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;


//Creates submit button with event listener
const init = () => {
    submitBtn = document.querySelector("#submitDesc");
    submitBtn.addEventListener("click", submitDescription); 
}


//Submits description and starts timer
const submitDescription = () => {
    stopBtn = document.querySelector("#stopTime");
    stopDiv = document.querySelector("#stopDiv");
    description = document.getElementById("description").value;
    seconds = 0;

    submitBtn.style.display = "none";
    stopDiv.style.display = "block";

    stopBtn.addEventListener("click", myStopFunction);

    myInterval = setInterval(myTimer, 1000);
}


//Finds current day's totals
const findDayTotals = () => {
    today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    if(today == lastUsedDay) {
        let prevDayTotalRow;
        prevDayTotalRow = document.getElementById("total" + today);
        
        if (prevDayTotalRow) {
            prevDayTotalRow.parentNode.removeChild(prevDayTotalRow);
        }

        let dateTotalRow = document.createElement("tr");
        dateTotalRow.setAttribute("id", "total" + today);
        let dateData = document.createElement("td");
        let dateTotalDesc = document.createElement("td");
        let dateTotalData = document.createElement("td");

        dateData.innerHTML = lastUsedDay;
        dateTotalDesc.innerHTML = "Totals"
        dateTotalData.innerHTML = dateTotal;

        dateTotalRow.appendChild(dateData);
        dateTotalRow.appendChild(dateTotalDesc);
        dateTotalRow.appendChild(dateTotalData);
        table.appendChild(dateTotalRow);
    }
}


//Creates a timer for the current description
function myTimer() {
    seconds++;

    stopTimeDiv = document.getElementById("stopDiv");
    taskSpan = document.getElementById("taskSpan");
    taskSpan.innerHTML = `${description}`;

    timeSpan = document.getElementById("timeSpan");
    timeSpan.innerHTML = `${seconds} seconds`;
}


//Runs the functions to stop the time and find the day totals
function myStopFunction() {
    clearInterval(myInterval);
    stopTimer();
    findDayTotals();
    document.getElementById('table').style.display='table';
}


//Stops the timer, adds the seconds to the day total, and creates the table data
const stopTimer = () => {
    dateTotal += seconds;

    let table = document.getElementById("table");
    let newTaskRow = document.createElement("tr");
    let newTaskDate = document.createElement("td");
    let newTaskDesc = document.createElement("td");
    let newTaskTime = document.createElement("td");

    newTaskDate.innerHTML = today;
    newTaskDesc.innerHTML = description;
    newTaskTime.innerHTML = seconds;

    newTaskRow.appendChild(newTaskDate);
    newTaskRow.appendChild(newTaskDesc);
    newTaskRow.appendChild(newTaskTime);
    table.appendChild(newTaskRow);
    lastUsedDay = today;

    submitBtn.style.display = "block";
    stopDiv.style.display = "none";
}

window.onload = init;