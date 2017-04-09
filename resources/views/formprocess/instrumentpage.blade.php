<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    {{--<link rel="stylesheet" href="css/instrumentcss.css">--}}

    <meta name="csrf_token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ URL::asset('css/instrumentcss.css') }}"/>
</head>
<body>

<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog modal-lg">


        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="Qtitle">
                    <input type="hidden" id="questionid"/>
                    <div style="margin-right: 40px;">
                        <form id="questionForm" method="post">
                            <textarea id="Question" name="Question" placeholder="  Question"
                                                               class="form-control" rows="3"
                                                               style="margin-left: 20px"></textarea>
                        </form>
                    </div>
                    <br>
                    <div class="w3-row">
                        <dive class="w3-col s5" style="margin-left: 20px;">
                            <select id="Qtype" class="form-control" name="QtypeName">
                                <option>Choose a Type</option>
                                <option value="Radio Button">Radio Button</option>
                                <option value="Check Box">Check Box</option>
                                <option value="Drop Down Menu">Drop Down Menu</option>
                                <option value="Text Box">Text Box</option>
                                <option value="Email">Email</option>
                                <option value="Date">Date</option>
                            </select>
                        </dive>

                        <div class="w3-col s2" style="margin-left: 10px;">
                            <input type="number" class="form-control" min="1" max="10" id="Qnumber" name="Qnumber"
                                   value="1"/>
                        </div>

                        <div class="w3-col s4">
                            <button class="btn btn-default" type="button" id="Qset" onclick="creatOptionsFunc()"
                                    style="margin-left: 10px;width: 90%;">+
                            </button>
                        </div>
                    </div>
                    <br>

                </div>
                <div id="Qedite" name="QediteName"
                     style="overflow-y: scroll; height: 60%;margin-right: 22px;margin-bottom: 19px;">
                </div>
                <input type="button" class="btn btn-primary" style="float: right;
                            margin-right: 20px;"  onclick="createQuestFunc()" id="closeNewStd" value="Set"/>
                {{--onclick="createQuestFunc()"--}}

        </div>


        <div class="modal-content" id="modalId">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="w3-row">
                    <div class="w3-col s2">
                        <h2 class="modal-title" style="margin-top: -1px;
                                    width: 266px;
                                    margin-left: 6px;">Create Instrument</h2>
                    </div>
                    <div class="w3-col s2">
                        <button id="addQuestionButton" class="addButton" onclick="openNav()" style="    width: 160px;
                                        margin-right: -50px;">+ Question
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="height: 78%;">
                <div id="scroll2" class="scroll3" style="height: 100%;">


                </div>
            </div>
            <div class="modal-footer">
                <input name="submitStudy" type="submit" id="submitStudy" data-dismiss="modal" class="btn btn-primary"
                       style="margin-top: -10px;" value="Create"/>
            </div>
        </div>
    </div>
</div>

<div class="w3-topnav" style="background-color: #002440; color: #cae4db;    height: 40px;">

    <p style="float: left">Clean Collector | Instrument Page</p>

    <a href="logOut.php" style="float: right">Log Out</a>
</div>

<div class="container" style="width: 90%;    margin-top: 45px;">


    <div class="w3-row" style="margin-bottom: 16px;">
        <div class="w3-col s3" id="searchAndTitle">
            <h1 id="studyText">Instruments</h1>
        </div>
        <div class="w3-col s7" style="    margin-left: -45px;">
            <input id="myInput" type="text" name="search" placeholder="Search.." onkeyup="myFunction()">
        </div>
        <div class="w3-col s2" style=;">
            <button id="addSTDbutton" class="addButton" onclick="myFunction1()" data-toggle="modal"
                    data-target="#addInstModal">+ Instrument
            </button>
        </div>
    </div>

    <div class="modal fade" id="addInstModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content addInstModalClass">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Instrument</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="/storeinstrument/{{$studyname}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control" placeholder="Instrument Name" name="instrumentname">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-row">

        <div class="w3-col s3  w3-center" style="margin-top: 27px">
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN' type="bottun" class="btn btn-block " onclick="goTostudy()"
                        style="background-color: #002440;color: #cae4db ">Study
                </button>
            </div>
            <div class="w3-section active" style="width:60%">
                <button id='selectedStepsBTN' type="bottun" class="btn  btn-block"
                        style="background-color: #ab987a;color: #00303f ">Instrument
                </button>
            </div>
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN' type="bottun" class="btn  btn-block" onclick="goToTest()"
                        style="background-color: #002440;color: #cae4db">Test
                </button>
            </div>
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN' type="bottun" class="btn  btn-block" onclick="goToShare()"
                        style="background-color: #002440;color: #cae4db">Share
                </button>
            </div>
        </div>

        <div class="w3-col s9  w3-center"
             style="height: auto;margin-left: -23px;border: 2px solid #2e6da4;border-radius: 5px">
            <div class="w3-row tabletitle">
                <div class="w3-col s3" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">
                        Instrument Name</h4></div>
                <div class="w3-col s3" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">
                        from Study</h4></div>
                <div class="w3-col s2" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">
                        Date</h4></div>
                <div class="w3-col s2" style="height: 35px;float: left"></div>
                <div class="w3-col s1" style="height: 35px;float: left"></div>
                <div class="w3-col s1" style="height: 35px;float: left"></div>
            </div>
            <hr style="margin-top: 11px;
    margin-bottom: 10px;
    width: 95%;">
            @foreach($selectinstrus as $item)
                <div class="w3-row tablecontent">
                    <input type="hidden" id="instrumentid" value="{{$item['id']}}">
                    <div class="w3-col s3" style="height: 25px;float: left" id="instrument" ><h5
                                style="float: left">{{$item['instrumentname']}}</h5></div>
                    <div class="w3-col s3" style="height: 25px;float: left"><h5
                                style="float: left">{{$item['studyname']}}</h5></div>
                    <div class="w3-col s2" style="height: 25px;float: left"><h5 style="float: left">Date</h5></div>
                    <div class="w3-col s2" style="height: 25px;float: left"><a href="#" class="withOutUndeline"
                                                                               id="customize"
                                                                               data-toggle="modal"
                                                                               data-target="#myModal"
                                                                               onclick="loadScrollPage(' . $ArgID . ',' . $ArgAccess . ');return false;">Customize</a>
                    </div>
                    <div class="w3-col s1" style="height: 25px;float: left"><a href="#" class="withOutUndeline"
                                                                               data-toggle="modal"
                                                                               data-target="#myModal"
                                                                               onclick="loadScrollPage(' . $ArgID . ',' . $ArgAccess . ')">preview</a>
                    </div>
                    <input type="radio" id="{{$item['id']}}" class="radio w3-col s1" name="id"
                           value="{{$item['instrumentname']}}">
                </div>
            @endforeach
        </div>
    </div>

</div>

<?php
if(isset($_POST['submit'])) {
    // your php code
    echo "hihihihihihihihihihih";
} else {
    // your html code

}

?>

<script src="js/createquestion.js"></script>
<script>
    var questionNumber;
    var questionNumberMax;
    var optionArray = [];
    var optionString = "";


    function QuestionTypeFunc(str, Ques) {
        var deleteBTN = document.getElementById("editeBTNID");//+ (questionNumber - 1));

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var QuestionURLstring = "answerRequest.php?q=" + str + "&q2=" + JS_instrumentID + "&q3=" + Ques + "&q4=" + questionNumber.toString() + "&qn=" + Qn.toString();
        for (var iiii = 0; iiii < Qn; iiii++) {
            var qtt = document.getElementById('OptionId' + iiii.toString()).value;
            QuestionURLstring += "&qt" + iiii.toString() + "=" + qtt;
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var a = this.responseText.toString();
                deleteBTN.setAttribute("onclick", "deleteFunc(" + a + ")");

                deleteBTN.setAttribute("id", "deleteBtnID" + a);
                document.getElementById("addDiv").setAttribute("id", "addDiv_" + a);
                // document.getElementById("txtHint").innerHTML ="this is ajax: "+a;
            }
        };
        //document.getElementById("URL_Label").innerHTML = "irgomosfks";//xmlhttp.responseText;

        xmlhttp.open("GET", QuestionURLstring, true);

        xmlhttp.send();

    }

    function add_Instru() {

        var strI = $("#resizer").val();
        //window.alert("addInstru.php?strI=" + strI);
        var xhttp;
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                location.replace("instrumentPage.php");
            }
        }
        xhttp.open("GET", "addInstru.php?strI=" + strI, true);
        xhttp.send();

    }

    function goTostudy() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "unsetSession.php", true);
        xmlhttp.send();
        window.location = "studyPage.php";
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "500px";
        myFunction1();
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function myFunction1() {
        var Qedit = document.getElementById('Qedite');
        var numberChild = Qedit.childElementCount;
        for (var i = 0; i <= numberChild; i++) {
            Qedit.removeChild(Qedit.childNodes[0]);
        }
    }

    function creatOptionsFunc() {
        var qType = document.getElementById("Qtype").value;
        var Qnumber = document.getElementById("Qnumber").value;

        if (qType === "Radio Button" || qType === "Check Box" || qType === "Drop Down Menu" || qType === "Text Box") {
            for (var i = 0; i < Qnumber; i++) {

                var x = document.createElement("INPUT");
                x.setAttribute("class", "Option form-control w3-animate-bottom");
                x.setAttribute("id", "OptionId" + i.toString());
                x.setAttribute("name", "nameOptext");
                x.setAttribute("type", "text");
                x.setAttribute("placeholder", "  Option");
                document.getElementById("Qedite").appendChild(x);
            }

        }
    }

    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function goToShare() {
        window.location = "share.php";
    }

    function goToTest() {
        var InstrumentID = $("input[name='instruments_name']:checked").val();
        var xhttp;
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.open("GET", "setInstrument.php?instrumentID=" + InstrumentID, true);
        xhttp.send();
        window.location = "TestPage.php";
    }

    var JS_instrumentID = "";

    var JS_strAccess = "";

    function loadScrollPage(myID, strAccess) {
        JS_instrumentID = myID;
        JS_strAccess = strAccess;
    }

    function deleteFunc(Qid) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        var QuestionURLstring = "deleteQuestion.php?qid=" + Qid.toString();

        xmlhttp.open("GET", QuestionURLstring, true);

        xmlhttp.send();
        $("#addDiv_" + Qid.toString()).remove();
    }

</script>

</body>
</html>

