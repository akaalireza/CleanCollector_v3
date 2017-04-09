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
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/studycss.css">
</head>
<body>

<div class="w3-topnav" style="background-color: #002440; color: #cae4db;    height: 40px;">

    <p style="float: left">Clean Collector | Study Page</p>

    <a href="logOut.php" style="float: right">Log Out</a>
</div>

<div class="container" style="width: 90%;    margin-top: 45px;">


    <div class="w3-row" style="margin-bottom: 4px;">
        <div class="w3-col s3" id="searchAndTitle">
            <h1 id="studyText">Studies</h1>
        </div>
        <div class="w3-col s7" style="    margin-left: -45px;">
            <input id="myInput" type="text" name="search" placeholder="Search.." onkeyup="myFunction()">
        </div>
        <div class="w3-col s2" style=;">
            <button id="addSTDbutton" data-toggle="modal" data-target="#myModal">+ Study</button>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add study</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="/storestudy">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input class="form-control" placeholder="Study Name" name="studyname">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="w3-row">

        <div class="w3-col s3  w3-center" style="margin-top: 20px">
            <div class="w3-section active" style="width:60%">
                <button id='selectedStepsBTN' type="bottun" class="btn btn-block "
                        style="background-color: #ab987a;color: #002440 ">Study
                </button>
            </div>

            {{--<form id="sendtoinstru" method="post" action="instrumentpage">--}}
                {{--<div class="w3-section active" style="width:50%">--}}
                    {{--<input id='stepsBTN1' type="submit" class="stepsBTN btn  btn-block" value="Instrument"--}}
                            {{--style="background-color: #002440;color: #cae4db ">--}}
                    {{--</input>--}}
                {{--</div>--}}
                {{--<input type="submit" value="Go">--}}
            {{--</form>--}}
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN1' type="bottun" class="stepsBTN btn  btn-block"
                        style="background-color: #002440;color: #cae4db ">Instrument
                </button>
            </div>
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN2' type="bottun" class="stepsBTN btn  btn-block" onclick="goToTest()"
                        style="background-color: #002440;color: #cae4db">Test
                </button>
            </div>
            <div class="w3-section active" style="width:50%">
                <button id='stepsBTN3' type="bottun" class="stepsBTN btn  btn-block"
                        style="background-color: #002440;color: #cae4db">Share
                </button>
            </div>
            <div class="w3-section active" style="width:50%">
                <button id='deleteStudy' type="bottun" class="stepsBTN btn  btn-block" onclick="deleteStudy()"
                        style="background-color: #002440;color: #cae4db">Delete Study
                </button>
            </div>
        </div>

        <div class="w3-col s9  w3-center" style="height: auto;margin-left: -23px;border: 2px solid #2e6da4;border-radius: 5px">
            <div class="w3-row tabletitle">
                <div class="w3-col s3" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">Study Name</h4></div>
                <div class="w3-col s3" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">Created by</h4></div>
                <div class="w3-col s2" style="height: 35px;float: left"><h4 style="float: left; margin-top:  15px">Date</h4></div>
                <div class="w3-col s2" style="height: 35px;float: left"></div>
                <div class="w3-col s1" style="height: 35px;float: left"></div>
                <div class="w3-col s1" style="height: 35px;float: left"></div>
            </div>
            <hr style="margin-top: -20px;
    margin-bottom: 10px;
    width: 95%;">
            <form id="sendtostudy" method="post" action="instrumentpage">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($data as $item)
                    <div class="w3-row tablecontent">
                        <div class="w3-col s3" style="height: 25px;float: left"><h5 style="float: left">{{$item['studyname']}}</h5></div>
                        <div class="w3-col s3" style="height: 25px;float: left"><h5 style="float: left">{{$item['username']}}</h5></div>
                        <div class="w3-col s2" style="height: 25px;float: left"><h5 style="float: left">Date</h5></div>
                        <div class="w3-col s2" style="height: 25px;float: left"><input href="#" class="btn-link" value="Propertices"></div>
                        <div class="w3-col s1" style="height: 25px;float: left"><input href="#" class="btn-link" value="Propertices"></div>
                        <input type="radio" id="{{$item['id']}}" class="radio w3-col s1" name="id" value="{{$item['studyname']}}">
                    </div>
                @endforeach
            </form>

        </div>
    </div>

</div>
<script>
    function addStudy() {
        var strS = $("#resizer").val();
        var xhttp;
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //window.alert(this.responseText + "  userLogIn.php?strU=" + strU + "&strP=" + strP)
                // if (this.responseText != "true") {
                location.replace("studyPage.php");
                //  }
            }
        }
        xhttp.open("GET", "addStudy.php?strS=" + strS, true);
        xhttp.send();
    }


    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
//    function goToInstrument() {
//        var studyID = $("input[name='id']:checked").val();
//        window.alert("+____________ +"+ studyID);
////
////
////
////        var xhttp;
////        if (window.XMLHttpRequest) {
////            xhttp = new XMLHttpRequest();
////        } else {
////            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
////        }
////        xhttp.open("GET", "setStudy.php?studyID=" + studyID, true);
////        xhttp.send();
//       window.location = "instrumentpage.php";
////                window.alert(document.getElementsByName("id").)
//    }

    function deleteStudy() {
        var studyID = $("input[name='id']:checked").val();
        //window.alert("deleteStudy.php?deleteStudyID=" + studyID);
        var xhttp;
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.open("GET", "deleteStudy.php?deleteStudyID=" + studyID, true);
        xhttp.send();
        window.location.replace("studyPage.php");
    }
    function goToTest() {
        var InstrumentID = $("input[name='instruments_name']:checked").val();
        //window.alert("+____________ +"+ radioID);
        var xhttp;
        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.open("GET", "setInstrument.php?instrumentID=" + InstrumentID, true);
        xhttp.send();
        window.location = "TestPage.php";
//                window.alert(document.getElementsByName("id").)
    }

</script>
<script src="js/ajaxstudy.js"></script>

</body>


</html>

