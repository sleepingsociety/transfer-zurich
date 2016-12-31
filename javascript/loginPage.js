$(document).ready(function() {
    $( ".footer" ).click(function() {
        console.log("test")
    });
});

function changePage(which) {
    document.location.href = which;

}


var users = [{name:"Dominik O'Kerwin", position:"Driver"},
    {name:"David Kalchofner", position:"Admin"},
    {name:"Lukas Auriquio", position:"Programmer"},
    {name:"Johann Widmer", position:"Admin"},
    {name:"Oriol Gut", position:"Driver"},
    {name:"Nizar Dübi", position:"Driver"},
    {name:"Olivier Amez-Droz", position:"Driver"},
    {name:"Selina Moser", position:"Driver"},
    {name:"Nam Nguyen", position:"Driver"},
    {name:"Robin Meier", position:"Driver"}];



function createUsers() {
    var mixed = document.getElementById("usersContainer");
    for(var i = 0; i < users.length; i++) {
        var div = document.createElement('div');
        div.id = 'users';
        div.className = "col-xs-12 col-sm-6 col-md-2 col-lg-2"

        div.onclick = function () {
            changePage("singleUserPage.php");
        };

        var img = document.createElement("img");
        var imgSrc = "img/icon-user-default.png";
        img.src = imgSrc;

        var text = document.createElement('p');
        text.innerHTML = users[i].name + "<br>" + users[i].position;

        div.appendChild(img);
        div.appendChild(text);
        mixed.appendChild(div);
    }
}

var drivers = [{name:"Dominik O'Kerwin", license:"B", timeLeft:"9:00"},
    {name:"David Kalchofner", license:"B", timeLeft:"9:00"},
    {name:"Lukas Auriquio", license:"BE", timeLeft:"9:00"},
    {name:"Johann Widmer", license:"D", timeLeft:"9:00"},
    {name:"Oriol Gut", license:"D", timeLeft:"9:00"},
    {name:"Nizar Dübi", license:"B", timeLeft:"9:00"},
    {name:"Olivier Amez-Droz", license:"B", timeLeft:"9:00"},
    {name:"Selina Moser", license:"C", timeLeft:"9:00"},
    {name:"Nam Nguyen", license:"C", timeLeft:"9:00"},
    {name:"Robin Meier", license:"BE", timeLeft:"9:00"}];

var cars = [{name:"Auto1", license:"B", places:"4", luggage:"3"},
    {name:"Auto2", license:"B", places:"4", luggage:"3"},
    {name:"Auto3", license:"BE", places:"4", luggage:"8"},
    {name:"Auto4", license:"D", places:"16", luggage:"10"},
    {name:"Auto5", license:"D", places:"16", luggage:"10"},
    {name:"Auto6", license:"B", places:"4", luggage:"3"},
    {name:"Auto7", license:"B", places:"4", luggage:"3"},
    {name:"Auto8", license:"C", places:"3", luggage:"10"},
    {name:"Auto9", license:"C", places:"3", luggage:"10"},
    {name:"Auto10", license:"BE", places:"4", luggage:"8"}];

var tasks = [{name:"Auftrag1", from:"Zurich Hotel", to:"Bern", when:"8:29", arrival:"9:31", luggage:"1", people:"2", driver:"", car:""},
    {name:"Auftrag2", from:"Zurich", to:"Zurich Hotel", when:"9:30", arrival:"10:30", luggage:"3", people:"4", driver:"", car:""},
    {name:"Auftrag3", from:"Zurich", to:"Zurich Hotel", when:"10:30", arrival:"12:30", luggage:"3", people:"3", driver:"", car:""},
    {name:"Auftrag4", from:"Zurich", to:"Lugano", when:"11:30", arrival:"12:30", luggage:"1", people:"2", driver:"", car:""},
    {name:"Auftrag5", from:"Basel", to:"Basel Hotel", when:"11:30", arrival:"13:30", luggage:"5", people:"5", driver:"", car:""},
    {name:"Auftrag6", from:"Basel", to:"Zug Hotel", when:"14:30", arrival:"15:00", luggage:"6", people:"4", driver:"", car:""},
    {name:"Auftrag7", from:"Zurich", to:"Basel Hotel", when:"15:30", arrival:"18:30", luggage:"7", people:"8", driver:"", car:""},
    {name:"Auftrag8", from:"Zurich", to:"Chur Hotel", when:"17:30", arrival:"18:30", luggage:"9", people:"3", driver:"", car:""},
    {name:"Auftrag9", from:"Zurich", to:"Lugano Hotel", when:"21:30", arrival:"22:30", luggage:"2", people:"4", driver:"", car:""},
    {name:"Auftrag10", from:"Zurich", to:"Zug Hotel", when:"21:30", arrival:"23:30", luggage:"3", people:"4", driver:"", car:""}];

var requested = [{name:"Crealogix", sendDate:"16.12.2016", forDate:"20.12.2016", people:"4"},
    {name:"Snowflakes", sendDate:"06.11.2016", forDate:"10.11.2016", people:"2"},
    {name:"Crealogix", sendDate:"06.10.2016", forDate:"10.10.2016", people:"7"},
    {name:"Atap-Transfers", sendDate:"11.12.2016", forDate:"15.12.2016", people:"3"},
    {name:"Nexus", sendDate:"03.10.2016", forDate:"07.10.2016", people:"2"},
    {name:"SIX", sendDate:"13.09.2016", forDate:"17.09.2016", people:"4"},
    {name:"NYP", sendDate:"01.01.2017", forDate:"05.01.2017", people:"1"},
    {name:"Nexus", sendDate:"26.12.2016", forDate:"30.12.2016", people:"8"},
    {name:"NYP", sendDate:"18.12.2016", forDate:"22.12.2016", people:"7"},
    {name:"NYP", sendDate:"01.12.2016", forDate:"06.12.2016", people:"10"}];

function createAllocationTable() {
    var mixed = document.getElementById("allocationTable");
    var thead = document.createElement("thead");
    var tr = document.createElement("tr");
    var th = document.createElement("th");
    tr.appendChild(th);
    for (var i = 0; i < drivers.length; i++) {
        var th = document.createElement("th");
        var txt = document.createTextNode(drivers[i].name);
        th.appendChild(txt);
        tr.appendChild(th);
    }
    thead.appendChild(tr);
    mixed.appendChild(thead);

    var times = [];
    var hour = 0;
    for(var i = 0; i < 48; i++) {
        if(i % 2 == 0) {
            times[i] = hour + ":" + "00"
        } else {
            times[i] = hour + ":" + "30"
            hour++;
        }
    }

    var tbody = document.createElement("tbody");
    for(var i = 0; i < times.length; i++) {
        var tr1 = document.createElement("tr");
        var td1 = document.createElement("td");
        var txt1 = document.createTextNode(times[i]);
        td1.appendChild(txt1);
        tr1.appendChild(td1);
        for(var j = 0; j < drivers.length; j++) {
            var td11 = document.createElement("td");
            tr1.appendChild(td11);
        }
        tbody.appendChild(tr1);
        mixed.appendChild(tbody);
    }

    var mixed = document.getElementById("allocationTable");
    var tfoot = document.createElement("tfoot");
    var tr2 = document.createElement("tr");
    var th2 = document.createElement("th");
    tr2.appendChild(th2);
    for (var i = 0; i < drivers.length; i++) {
        var th2 = document.createElement("th");
        var txt2 = document.createTextNode(drivers[i].name);
        th2.appendChild(txt2);
        tr2.appendChild(th2);
    }
    tfoot.appendChild(tr2);
    mixed.appendChild(tfoot);
}

var currentPosTask;
var currentPosDriver;
var currentPosCar;

function select(x, which) {
    var table;
    var oldPos;
    var newPos;
    if(which == "task") {
        console.log("task")
        table = "taskTable";
        if(currentPosTask != null) {
            oldPos = currentPosTask;
        }
        newPos = x.rowIndex
        currentPosTask = newPos;

    } else if(which == "driver") {
        console.log("driver")
        table = "driversTable";
        if(currentPosDriver != null) {
            oldPos = currentPosDriver;
        }
        newPos = x.rowIndex
        currentPosDriver = newPos;
    } else {
        console.log("car")
        table = "carsTable";
        if(currentPosCar != null) {
            oldPos = currentPosCar;
        }
        newPos = x.rowIndex
        currentPosCar = newPos;
    }

    var row = document.getElementById(table).getElementsByTagName("tr");
    if(oldPos != null) {
        row[oldPos+1].style.backgroundColor = "#ffffff";
    }
    row[newPos+1].style.backgroundColor = "#add8e6";


}

function saveAllocation() {
    //ajax call or something similar to save all the things correctly or so

    document.location.href = "adminOverview.php";

}

function checkingSelected() {
    if(currentPosCar != null && currentPosDriver != null && currentPosTask != null) {
        //do more checking if this even works like works with weight, license and so on
        //car not used in the moment, not gonna be under 0 hours
        var startTime = tasks[currentPosTask-1].when;
        var endTime= tasks[currentPosTask-1].arrival;
        tasks[currentPosTask-1].driver = drivers[currentPosDriver-1].name;
        tasks[currentPosTask-1].car = cars[currentPosCar-1].name;


        //this part is to check if its 00 or 30 min to better add it in table
        var parts1 = startTime.split(":");
        var pos1;
        var h1 = parseInt(parts1[0]);
        var min1 = parseInt(parts1[1])
        var pos2;
        var parts2 = endTime.split(":");
        var h2 = parseInt(parts2[0])
        var min2 = parseInt(parts2[1])

        var min = parseInt(min2) - parseInt(min1);
        var h = parseInt(h2) - parseInt(h1)
        console.log(h2 + " " + h1)
        if(min < 0) {
            min = 60 + min;
            h -= 1;
        }

        var timeLeft = drivers[currentPosDriver + 1].timeLeft;
        var parts3 = timeLeft.split(":");
        var tH = parts3[0];
        var tMin = parts3[1];

        var lMin = parseInt(tMin) - min;
        var lH = parseInt(tH) - h
        if(lMin < 0) {
            lMin = 60 + lMin;
            lH -= 1;
        }
        if(lMin < 10) {
            lMin = "0" + lMin;
        }
        drivers[currentPosDriver+1].timeLeft = lH + ":" + lMin;

        var timeLeftTable = document.getElementById("driversTable");
        timeLeftTable.rows[currentPosDriver].cells[2].innerHTML = drivers[currentPosDriver+1].timeLeft



        console.log(h + ":" + min)


        if(parts1[1] != "00" || parts1[1] != "30") {

            if(min1 < 30) {
                //startTime = parts1[0] + ":" + "30";
                pos1 = h1 * 2 + 1;
            } else {
                h1 += 1;
                //startTime = h + ":" + "00"
                pos1 = h1 * 2;
            }

        }

        if(parts2[1] != "00" || parts2[1] != "30") {

            if(min2 < 30) {
                //endTime = parts2[0] + ":" + "30;";
                pos2 = h2 * 2 + 1;
            } else {
                h2 += 1;
                //endTime = h + ":" + "00"
                pos2 = h2 * 2;
            }
        }

        for(var i = pos1-1; i <= pos2; i++) {
            var table = document.getElementById("allocationTable").rows[i+1].cells[currentPosDriver]
            table.style.backgroundColor = "#add8e6";
            table.setAttribute('title',   "Auftrag: " + tasks[currentPosTask-1].name
                                      + "\nVon:        " + tasks[currentPosTask-1].to
                                      + "\nNach:     " + tasks[currentPosTask-1].to
                                      + "\nWann:    " + tasks[currentPosTask-1].when
                                      + "\nBis:         " + tasks[currentPosTask-1].arrival
                                      + "\nAuto:     " + cars[currentPosCar-1].name);
        }




        var turnedOffRow = document.getElementById("taskTable").rows[currentPosTask]
        turnedOffRow.style.backgroundColor = "#bbbbbb";
        turnedOffRow.onclick = function() {

        }
        var deselect1 = document.getElementById("driversTable").rows[currentPosDriver]
        var deselect2 = document.getElementById("carsTable").rows[currentPosCar]
        deselect1.style.backgroundColor = "#ffffff"
        deselect2.style.backgroundColor = "#ffffff"
        currentPosCar = null
        currentPosDriver = null
        currentPosTask = null
    }
}

function createRows(type) {
    if(type == "driver") {
        var mixed = document.getElementById("driversTable");
        var usedArray = drivers;
        //var arguments = driverArguments;
        console.log(arguments.length)
    } else if(type == "task") {
        var mixed = document.getElementById("taskTable");
        var usedArray = tasks;
        //var arguments = driverArguments;
        console.log(arguments.length)
    } else if(type == "car"){
        var mixed = document.getElementById("carsTable");
        var usedArray = cars;
        //var arguments = driverArguments;
        console.log(arguments.length)
    } else {
        var mixed = document.getElementById("requestedTasksTable");
        var usedArray = requested;
        //var arguments = driverArguments;
        console.log(arguments.length)
    }
    // IE7 only supports appending rows to tbody
    var tbody = document.createElement("tbody");

    // for each outer array row

    for (var i = 0; i < usedArray.length; i++) {
        var tr = document.createElement("tr");

        // for each inner array cell
        // create td then text, append
        if(type == "driver") {
            tr.className = 'clickable-row';
            tr.onclick = function () {
                select(this, "driver")
            }
            var td = document.createElement("td");
            var txt = document.createTextNode(usedArray[i].name);
            td.appendChild(txt);
            tr.appendChild(td);
            var td1 = document.createElement("td");
            var txt1 = document.createTextNode(usedArray[i].license);
            td1.appendChild(txt1);
            tr.appendChild(td1);
            var td2 = document.createElement("td");
            var txt2 = document.createTextNode(usedArray[i].timeLeft);
            td2.appendChild(txt2);
            tr.appendChild(td2);
        } else if(type == "car") {
            tr.className = 'clickable-row';
            tr.onclick = function () {
                select(this, "car")
            }
            var td = document.createElement("td");
            var txt = document.createTextNode(usedArray[i].name);
            td.appendChild(txt);
            tr.appendChild(td);
            var td1 = document.createElement("td");
            var txt1 = document.createTextNode(usedArray[i].license);
            td1.appendChild(txt1);
            tr.appendChild(td1);
            var td2 = document.createElement("td");
            var txt2 = document.createTextNode(usedArray[i].places);
            td2.appendChild(txt2);
            tr.appendChild(td2);
            var td3 = document.createElement("td");
            var txt3 = document.createTextNode(usedArray[i].luggage);
            td3.appendChild(txt3);
            tr.appendChild(td3);
        } else if(type == "task") {
            tr.className = 'clickable-row';
            tr.onclick = function () {
                select(this, "task")
            }
            var td1 = document.createElement("td");
            var txt1 = document.createTextNode(usedArray[i].from);
            td1.appendChild(txt1);
            tr.appendChild(td1);
            var td2 = document.createElement("td");
            var txt2 = document.createTextNode(usedArray[i].to);
            td2.appendChild(txt2);
            tr.appendChild(td2);
            var td3 = document.createElement("td");
            var txt3 = document.createTextNode(usedArray[i].when);
            td3.appendChild(txt3);
            tr.appendChild(td3);
            var td6 = document.createElement("td");
            var txt6 = document.createTextNode(usedArray[i].arrival);
            td6.appendChild(txt6);
            tr.appendChild(td6);
            var td4 = document.createElement("td");
            var txt4 = document.createTextNode(usedArray[i].luggage);
            td4.appendChild(txt4);
            tr.appendChild(td4);
            var td5 = document.createElement("td");
            var txt5 = document.createTextNode(usedArray[i].people);
            td5.appendChild(txt5);
            tr.appendChild(td5);
        } else {
            tr.className = 'clickable-row';
            tr.onclick = function () {
                document.location.href = "taskView.php"
            }
            var td1 = document.createElement("td");
            var txt1 = document.createTextNode(usedArray[i].name);
            td1.appendChild(txt1);
            tr.appendChild(td1);
            var td2 = document.createElement("td");
            var txt2 = document.createTextNode(usedArray[i].sendDate);
            td2.appendChild(txt2);
            tr.appendChild(td2);
            var td3 = document.createElement("td");
            var txt3 = document.createTextNode(usedArray[i].forDate);
            td3.appendChild(txt3);
            tr.appendChild(td3);
            var td4 = document.createElement("td");
            var txt4 = document.createTextNode(usedArray[i].people);
            td4.appendChild(txt4);
            tr.appendChild(td4);
        }
        // append row to table
        // IE7 requires append row to tbody, append tbody to table
        tbody.appendChild(tr);
        mixed.appendChild(tbody);
    }
}

function forgotPassword() {
        document.getElementById("forgot-pw-div").classList.toggle("forgot-pw")
}