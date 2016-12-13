$(document).ready(function() {
    $( ".footer" ).click(function() {
        console.log("test")
    });

    $('#bs-example-navbar-collapse-1').on('shown.bs.collapse', function () {
        console.log("Opened")
    });

    $('#bs-example-navbar-collapse-1').on('hidden.bs.collapse', function () {
        console.log("Closed")
    });





});

function changePage(which) {
    console.log(which)
    if(which == "allocation") {
        document.location.href = "allocationPage.php"
    } else if(which == "requestedTasks") {
        document.location.href = "requestedTasks.php"

    } else {
        document.location.href = "adminOverview.php"
    }

}


var users = [{name:"Dominik O'Kerwin", position:"Driver"},
    {name:"David Kalchofner", position:"Admin"},
    {name:"Lukas Auriquio", position:"Programmer"},
    {name:"Johann Widmer", position:"Admin"},
    {name:"Oriol Gut", position:"Driver"},
    {name:"Nizar Dübi", position:"Driver"},
    {name:"Olivier Amez-Droz", position:"Driver"},
    {name:"Selina Moser", position:"Driver"},
    {name:"Nam Nguyen?", position:"Driver"},
    {name:"Robin Meier", position:"Driver"}];


function createUsers() {
    console.log("1")
    var mixed = document.getElementById("usersContainer");
    var div = document.createElement("div");
    console.log(users.length)
    for(var i = 0; i < users.length; i++) {
        console.log(i)
        div.className = "userDiv";
        var img = document.createElement("img");
        var imgSrc = "img/icon-user-default.png";
        img.src = imgSrc;
        text = document.createElement("p");
        text.innerHTML = users[i].name + "<br>" + users[i].position;

        img.appendChild(div);
        text.appendChild(div);
        div.appendChild(mixed)
        body.appendChild(div);
    }
}

var drivers = [{name:"Dominik O'Kerwin", license:"B"},
    {name:"David Kalchofner", license:"B"},
    {name:"Lukas Auriquio", license:"BE"},
    {name:"Johann Widmer", license:"D"},
    {name:"Oriol Gut", license:"D"},
    {name:"Nizar Dübi", license:"B"},
    {name:"Olivier Amez-Droz", license:"B"},
    {name:"Selina Moser", license:"C"},
    {name:"Nam Nguyen?", license:"C"},
    {name:"Robin Meier", license:"BE"}];

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

var tasks = [{name:"Auftrag1", from:"Zurich Hotel", to:"Bern", when:"8:30", luggage:"1", people:"2"},
    {name:"Auftrag2", from:"Zurich", to:"Zurich Hotel", when:"9:30", luggage:"3", people:"4"},
    {name:"Auftrag3", from:"Zurich", to:"Zurich Hotel", when:"10:30", luggage:"3", people:"3"},
    {name:"Auftrag4", from:"Zurich", to:"Lugano", when:"11:30", luggage:"1", people:"2"},
    {name:"Auftrag5", from:"Basel", to:"Basel Hotel", when:"11:30", luggage:"5", people:"5"},
    {name:"Auftrag6", from:"Basel", to:"Zug Hotel", when:"14:30", luggage:"6", people:"4"},
    {name:"Auftrag7", from:"Zurich", to:"Basel Hotel", when:"15:30", luggage:"7", people:"8"},
    {name:"Auftrag8", from:"Zurich", to:"Chur Hotel", when:"17:30", luggage:"9", people:"3"},
    {name:"Auftrag9", from:"Zurich", to:"Lugano Hotel", when:"21:30", luggage:"2", people:"4"},
    {name:"Auftrag10", from:"Zurich", to:"Zug Hotel", when:"21:30", luggage:"3", people:"4"}];

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

    var times = new Array();
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
        /*tr.className = 'clickable-row';
        tr.onclick = function () {
            alert("go Fetch the right ID");
        }*/

        // for each inner array cell
        // create td then text, append
        if(type == "driver") {
            var td = document.createElement("td");
            var txt = document.createTextNode(usedArray[i].name);
            td.appendChild(txt);
            tr.appendChild(td);
            var td1 = document.createElement("td");
            var txt1 = document.createTextNode(usedArray[i].license);
            td1.appendChild(txt1);
            tr.appendChild(td1);
        } else if(type == "car") {
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