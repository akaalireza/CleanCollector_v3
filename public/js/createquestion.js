/**
 * Created by AKA.alireza on 4/5/2017.
 */

$(document).ready(function () {

});

function createanswers(questionid) {


    alert(document.getElementById('Qedite').getElementsByTagName("input")[0].value)
    var mystring = '';
    var inputs = document.getElementById('Qedite').getElementsByTagName("input");

    for (var i =0 ; i<inputs.length ;i++){
        mystring += inputs[i].value ;
        if(i!= inputs.length-1){
            mystring += '^@'
        }
    }
    alert(mystring)

    $.ajax({
        type: "POST",
        url: "/answerajax",
        data: {
            '_token': $('input[name=_token]').val(),
            'questionid' : questionid,
            'numberofanswer' : document.getElementById('Qedite').getElementsByTagName("input").length,
            'data': mystring
        },
        cache: false,

        success: function(data){
            alert(data);
        },
        error: function() {
            alert("NO");
        }

    });
}

function QuestionTypeFunc3() {

    $.ajax({
        type: 'post',
        url: '/instruajax',
        data: {
            '_token': $('input[name=_token]').val(),
            'questiontext': $('#Question').val(),
            'questiontype': $('#Qtype').val(),
            'instrumentid': $('#instrumentid').val()
        },
        success: function (questionid) {

            alert("saved" +
                questionid);
            createanswers(questionid);
        },
        error: function (data) {
            alert("there is an error")
        }
    });
}

function createQuestFunc() {

    inumberofoption = 0;
    Qnumber =0 ;
    var Opt = document.getElementsByName("nameOptext");
    var div = document.createElement("DIV");
    var mandiv = document.getElementById('scroll2');
    var Ques = document.getElementById('Question').value;
    var QuesP = document.createElement("p");
    var Qt = document.getElementById('Qtype').value;
    Qn = document.getElementById('Qnumber').value;
    div.id = "addDiv";
    div.className = "aaa";
    QuesP.innerHTML = Ques;

    var editeBTN = document.createElement("input");
    editeBTN.setAttribute("type", "button");
    editeBTN.id = "editeBTNID";// + questionNumber;
    editeBTN.className = "editeBTNClass";
    editeBTN.value = "delete";
    editeBTN.setAttribute("onclick", "myFunction3();")


    div.appendChild(QuesP);
    div.appendChild(editeBTN);

    questionNumber++;

    if (Qt === "Radio Button") {

        optionArray[optionArray.length] = "r";
        optionString += "r";

        var ul_var = document.createElement("UL");
        ul_var.id = "ul_var_id";
        ul_var.className = "ul_var_class";

        for (var i = 0; i < Opt.length; i++) {

            var innerDiv1 = document.createElement("DIV");
            innerDiv1.id = "innerDivId";
            innerDiv1.className = "innerDivClass";

            var x = document.createElement("INPUT");
            x.setAttribute("type", "radio");
            x.id = "radioID/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.className = "radioClassName";
            x.value = "radioVal/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.name = "radioName/" + questionNumber.toString();
            innerDiv1.appendChild(x);

            var label = document.createElement("LABEL");
            label.id = "labelID";
            label.innerHTML = Opt[i].value;
            innerDiv1.appendChild(label);

            var li_var = document.createElement("LI");
            li_var.id = "li_var_id";
            li_var.className = "li_var_class";

            li_var.appendChild(innerDiv1);
            ul_var.appendChild(li_var);

        }
        div.appendChild(ul_var);
    } else if (Qt === "Check Box") {

        var ul_var = document.createElement("UL");
        ul_var.id = "ul_var_id";
        ul_var.className = "ul_var_class";

        optionArray[optionArray.length] = "c";
        optionString += "c";


        for (var i = 0; i < Opt.length; i++) {

            var innerDiv1 = document.createElement("DIV");
            innerDiv1.id = "innerDivId";
            innerDiv1.className = "innerDivClass";

            var x = document.createElement("INPUT");
            x.setAttribute("type", "checkbox");
            x.id = "checkBoxID/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.className = "checkBoxClass";
            x.value = "checkBoxVal/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.name = "chechBoxName/" + questionNumber.toString();
            innerDiv1.appendChild(x);

            var label = document.createElement("LABEL");
            label.id = "labelID";
            label.innerHTML = Opt[i].value;
            innerDiv1.appendChild(label);

            var li_var = document.createElement("LI");
            li_var.id = "li_var_id";
            li_var.className = "li_var_class";

            li_var.appendChild(innerDiv1);


            ul_var.appendChild(li_var);

        }
        div.appendChild(ul_var);
    } else if (Qt === "Drop Down Menu") {
        optionArray[optionArray.length] = "d";
        optionString += "d";
        var x = document.createElement("select");
        x.id = "comboBoxID/" + questionNumber.toString() + "/" + (i + 1).toString();
        x.className = "comboBoxClass";
        x.value = "comboBoxVal/" + questionNumber.toString() + "/" + (i + 1).toString();
        x.name = "comboBoxName/" + questionNumber.toString();

        for (var i = 0; i < Opt.length; i++) {
            var optionn = document.createElement("option");
            optionn.innerHTML = Opt[i].value;
            x.appendChild(optionn);
        }
        div.appendChild(x);
    } else if (Qt === "Text Box") {
        optionArray[optionArray.length] = "t";
        optionString += "t";
        for (var i = 0; i < Opt.length; i++) {
            var x = document.createElement("INPUT");
            x.setAttribute("type", "text");
            x.id = "textBoxID/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.className = "textBoxClass";
            x.name = "textBoxName/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.setAttribute("placeholder", "   " + Opt[i].value);
            div.appendChild(x);

        }
    } else if (Qt === "Email") {
        optionArray[optionArray.length] = "e";
        optionString += "e";
        for (var i = 0; i < Qn; i++) {
            var x = document.createElement("INPUT");
            x.setAttribute("type", "email");
            x.id = "emailID/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.className = "emailClass";
            x.name = "emailName/" + questionNumber.toString() + "/" + (i + 1).toString();
            x.setAttribute("placeholder", "   info@cleancollect.com");

            div.appendChild(x);

        }
    } else if (Qt === "Date") {
        optionArray[optionArray.length] = "1";
        optionString += "1";
        for (var i = 0; i < Qn; i++) {
            var x = document.createElement("INPUT");
            x.setAttribute("type", "date");
            x.id = "dateID/" + questionNumber.toString() + "/" + (i + 1).toString();
            s
            x.className = "dateClass";
            x.name = "dateName/" + questionNumber.toString() + "/" + (i + 1).toString();
            //x.setAttribute("value", Date());

            div.appendChild(x);

        }
    }
    mandiv.appendChild(div);

    QuestionTypeFunc3();

    closeNav();
    return false;
}
