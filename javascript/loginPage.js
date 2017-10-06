function openNav() {
    document.getElementById("myNav").style.width = "100%";
    //document.getElementById("myNav").fadeIn();

}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
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


var allTasks = [{name:"Auftrag01", date:"2017 02 14", status:"Abgeschlossen"},
    {name:"Auftrag02", date:"2017 02 14", status:"Abgeschlossen"},
    {name:"Auftrag03", date:"2017 02 13", status:"Abgeschlossen"},
    {name:"Auftrag04", date:"2017 01 01", status:"Abgeschlossen"},
    {name:"Auftrag05", date:"2017 01 23", status:"Abgeschlossen"},
    {name:"Auftrag06", date:"2017 01 24", status:"Abgeschlossen"},
    {name:"Auftrag07", date:"2017 02 20", status:"Angenommen"},
    {name:"Auftrag08", date:"2017 03 02", status:"Abgelehnt"},
    {name:"Auftrag09", date:"2017 03 31", status:"Angenommen"},
    {name:"Auftrag10", date:"2017 03 13", status:"Abgelehnt"},
    {name:"Auftrag11", date:"2017 04 02", status:"Abgelehnt"},
    {name:"Auftrag12", date:"2017 04 30", status:"Angenommen"},
    {name:"Auftrag13", date:"2017 04 13", status:"Abgelehnt"}];


$(document).ready(function() {
    document.getElementById("attention").hidden = true;
    $( ".footer" ).click(function() {
        console.log("test")
    });

});

function hideAttention() {
    document.getElementById("attention").hidden = true;
}


function changePage(which) {
    document.location.href = which;

}

function colorAllTasksViewChanger(newSelector) {
    var views = ["pastAllTasks", "todayAllTasks", "weekAllTasks", "monthAllTasks"]
    for(var i = 0; i < views.length; i++) {

        if(newSelector == views[i]) {
            document.getElementById(newSelector).setAttribute('style', 'background: linear-gradient(#efefef, #c5c5c5) !important');
        } else {
            document.getElementById(views[i]).setAttribute('style', 'background: linear-gradient(#fafafa, #dddddd) !important');
        }
    }

}

function checkIfPastDate(value1, value2) {
    var currentDate = new Date(value1[2]+"-"+value1[1]+"-"+value1[0])
    var parts = value2.split(" ");
   // console.log(parts[0]+"-"+parts[1]+"-"+parts[2])
    var comparedDate = new Date(parts[0]+"-"+parts[1]+"-"+parts[2])
    //console.log(currentDate.toDateString() + "   " + comparedDate.toDateString())
    return currentDate.getTime() > comparedDate.getTime();

}

Date.prototype.addDays = function(days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
}

Date.prototype.addMonths = function (m) {
    var d = new Date(this);
    var years = Math.floor(m / 12);
    var months = m - (years * 12);
    if (years) d.setFullYear(d.getFullYear() + years);
    if (months) d.setMonth(d.getMonth() + months);
    return d;
}

function checkIfDateLater(value1, value2, time) {
    var currentDate = new Date(value1[2]+"-"+value1[1]+"-"+value1[0])
    var maxDate
    if(time == "month") {
        maxDate = currentDate.addMonths(1)
    } else {
        maxDate = currentDate.addDays(7)
    }

    var parts = value2.split(" ");
    // console.log(parts[0]+"-"+parts[1]+"-"+parts[2])
    var comparedDate = new Date(parts[0]+"-"+parts[1]+"-"+parts[2])
    //console.log(currentDate.toDateString() + "   " + maxDate.toDateString())
    return currentDate.getTime() < comparedDate.getTime() && comparedDate.getTime() <= maxDate.getTime();


}

function changeAllTasksTable(which) {
    if(which == "past") {
        colorAllTasksViewChanger("pastAllTasks")
        var currentDateArray = getCurrentDate();

        var oTable = $('#allTaksTable').dataTable();
        oTable.fnClearTable();
        for(var i = 0; i < allTasks.length; i++) {
            if(checkIfPastDate(currentDateArray, allTasks[i].date)) {
                oTable.fnAddData([
                    allTasks[i].name, allTasks[i].date, allTasks[i].status]);
            }
        }
    } else if(which == "today") {
        colorAllTasksViewChanger("todayAllTasks")
        var currentDateArray = getCurrentDate();
        var currentDate = currentDateArray[2] + " " + currentDateArray[1] + " " + currentDateArray[0];

        var oTable = $('#allTaksTable').dataTable();
        oTable.fnClearTable();
        for(var i = 0; i < allTasks.length; i++) {
            if(allTasks[i].date == currentDate) {
                oTable.fnAddData([
                    allTasks[i].name, allTasks[i].date, allTasks[i].status]);
            }
        }
    } else if(which == "week") {
        colorAllTasksViewChanger("weekAllTasks")
        var currentDateArray = getCurrentDate();

        var oTable = $('#allTaksTable').dataTable();
        oTable.fnClearTable();
        for(var i = 0; i < allTasks.length; i++) {
            if(checkIfDateLater(currentDateArray, allTasks[i].date, "week")) {
                oTable.fnAddData([
                    allTasks[i].name, allTasks[i].date, allTasks[i].status]);
            }
        }
    } else if(which == "month"){
        colorAllTasksViewChanger("monthAllTasks")
        var currentDateArray = getCurrentDate();
        var oTable = $('#allTaksTable').dataTable();
        oTable.fnClearTable();
        for(var i = 0; i < allTasks.length; i++) {
            if(checkIfDateLater(currentDateArray, allTasks[i].date, "month")) {
                oTable.fnAddData([
                    allTasks[i].name, allTasks[i].date, allTasks[i].status]);
            }
        }
    }
}

function getCurrentDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }
    return [dd, mm, yyyy]
}

function fillAllTasksTable() {
    var currentDateArray = getCurrentDate();
    var currentDate = currentDateArray[2] + " " + currentDateArray[1] + " " + currentDateArray[0];
    document.getElementById("todayAllTasks").setAttribute('style', 'background: linear-gradient(#efefef, #c5c5c5) !important');

    var oTable = $('#allTaksTable').dataTable();
    oTable.fnClearTable();
    for(var i = 0; i < allTasks.length; i++) {
        if(allTasks[i].date == currentDate) {
            oTable.fnAddData([
                allTasks[i].name, allTasks[i].date, allTasks[i].status]);
        }
    }
}

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
        img.src = "../../img/icon-user-default.png";

        var text = document.createElement('p');

        div.appendChild(img);
        div.appendChild(text);
        mixed.appendChild(div);
    }
}

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

var allocatedTasks = new Array({});

function checkingSelected() {

    if(currentPosCar != null && currentPosDriver != null && currentPosTask != null) {
        //do more checking if this even works like works with weight, license and so on
        //car not used in the moment, not gonna be under 0 hours
        var startTime = tasks[currentPosTask-1].when;
        var endTime= tasks[currentPosTask-1].arrival;
        tasks[currentPosTask-1].driver = drivers[currentPosDriver-1].name;
        tasks[currentPosTask-1].car = cars[currentPosCar-1].name;
        var timeLeft = drivers[currentPosDriver + 1].timeLeft;

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
        //console.log(h2 + " " + h1)
        if(min < 0) {
            min = 60 + min;
            h -= 1;
        }


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
        if(lH < 0) {
            showAlert("Der Fahrer darf nicht mehr als 9 Stunden fahren.\n" +
                      "Bitte verwenden Sie einen anderen Fahrer.")
            return;
        }


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
            var table = document.getElementById("allocationTable").rows[i+1].cells[currentPosDriver];
            var rgb1 = "rgb(173, 216, 230)";
            var rgb2 = "rgb(204, 204, 204)";
            if(rgb1 == table.style.backgroundColor || rgb2 == table.style.backgroundColor ) {
                showAlert("Der Fahrer kann diesen Auftrag nicht annehmen.\n" +
                          "Er ist zur Zeit mit einem andern Auftrag beschäftigt.")
                return;
            }
            for(var j = 1; j < drivers.length; j++) {
                var table1 = document.getElementById("allocationTable").rows[i+1].cells[j];
                if(rgb1 == table1.style.backgroundColor || rgb2 == table1.style.backgroundColor ) {
                    if(table1.getAttribute('title').match(cars[currentPosCar-1].name)) {
                        showAlert("Das Auto steht im Moment nicht zur Verfügung");
                        return;
                    }
                }
            }
        }
        console.log(pos2)
        for(var i = pos1-1; i <= pos2; i++) {
            if(i == 48) {
                break;
            }
            var cell = document.getElementById("allocationTable").rows[i+1].cells[currentPosDriver]
            cell.style.backgroundColor = "#add8e6";
            cell.setAttribute('title',   "Auftrag: " + tasks[currentPosTask-1].name
                                      + "\nVon:        " + tasks[currentPosTask-1].from
                                      + "\nNach:     " + tasks[currentPosTask-1].to
                                      + "\nWann:    " + tasks[currentPosTask-1].when
                                      + "\nBis:         " + tasks[currentPosTask-1].arrival
                                      + "\nAuto:     " + cars[currentPosCar-1].name);
        }
        for(var i = pos2+1; i <= pos2+1 +(pos2-pos1+1); i++) {
            var table = document.getElementById("allocationTable").rows[i+1].cells[currentPosDriver]
            table.style.backgroundColor = "#cccccc";
            table.setAttribute('title',   "Auftrag: " + tasks[currentPosTask-1].name
                + "\nVon:        " + tasks[currentPosTask-1].to
                + "\nNach:     " + "ATAP Transfers"
                + "\nAuto:     " + cars[currentPosCar-1].name
                + "\nInfo:     " + "Auf der Rückfahrt vom Auftrag");
        }
        drivers[currentPosDriver+1].timeLeft = lH + ":" + lMin;
        var timeLeftTable = document.getElementById("driversTable");
        timeLeftTable.rows[currentPosDriver].cells[2].innerHTML = drivers[currentPosDriver+1].timeLeft



        var turnedOffRow = document.getElementById("taskTable").rows[currentPosTask]
        turnedOffRow.style.backgroundColor = "#bbbbbb";
        turnedOffRow.onclick = function() {

        }

        allocatedTasks[allocatedTasks.size] = {task:tasks[currentPosTask-1].name, driver:drivers[currentPosDriver-1].name,car:cars[currentPosCar-1].name}
        var deselect1 = document.getElementById("driversTable").rows[currentPosDriver]
        var deselect2 = document.getElementById("carsTable").rows[currentPosCar]
        deselect1.style.backgroundColor = "#ffffff"
        deselect2.style.backgroundColor = "#ffffff"
        currentPosCar = null
        currentPosDriver = null
        currentPosTask = null
    }
}

function showAlert(message) {
    document.getElementById("attentionMessage").innerHTML = message

    $("#attention").fadeIn("slow");

    setTimeout(function () {
        $("#attention").fadeOut("slow");
    }, 5000);
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