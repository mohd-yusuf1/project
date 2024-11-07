let string = "";
let arr = [];
let buttons = document.querySelectorAll(".btn");
let output = document.querySelector("#output");
let i = 0, j = 0;

Array.from(buttons).forEach((btn) => {
    btn.addEventListener("click", (e) => {
        console.log(e.target)
        if (e.target.innerHTML == '=' && e.target.innerHTML !== '') {
            string=string.replace("%","/100")
            string = eval(string);
            output.value = string;
        }
        else if (e.target.innerHTML == 'AC') {
            string = "";
            output.value = string;
        }
        else if (e.target.innerHTML == 'DEL') {
            string = string.substring(0, string.length - 1);
            output.value = string;
        }
        else if (e.target.innerHTML == '( )') {
            parenthesis();
        }
        else {
            string = string + e.target.innerHTML;
            output.value = string;
        }
    })
})

function parenthesis() {
    console.log(i)
    if (i == 0) {
        string = string + '('
        output.value = string;
        i++;
    }
    else {
        string = string + ')'
        output.value = string;
        i = 0;
    }
    console.log(i);
}