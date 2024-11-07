let userscore = 0;
let compscore = 0;
let i=2;
const choices = document.querySelectorAll(".choice");

choices.forEach((choice) => {
  choice.addEventListener("click", () => {
    let h=document.querySelector("#set");
    if(i>=0){
    h.innerText=`MOVES: ${i}`; 
    const userchoice = choice.getAttribute("id");
    playgame(userchoice);
    i--;
    }
  })
})

const gencompchoice = () => {
  const option = ["Rock", "Paper", "Scissor"];
  const index = Math.floor(Math.random() * 3);
  return option[index];
};

const playgame = (userchoice) => {
  console.log("user choice= ", userchoice);
  const compchoice = gencompchoice();
  console.log("computer choice= ", compchoice);
  compare(userchoice, compchoice);
  updatescore();
};

const compare = (userchoice, compchoice) => {
  let m = document.querySelector("#msg");
  if (userchoice === compchoice) {
    console.log("draw!");
    m.innerText = `Game was Draw. Play again`;
    m.style.backgroundColor = "#081B31"
  }
  else if (compchoice == "Rock" && userchoice == "Scissor" || compchoice == "Paper" && userchoice == "Rock" || compchoice == "Scissor" && userchoice == "Paper") {
    console.log("Computer win!");
    compscore++;
    m.innerText = `You lost.${userchoice} beats by ${compchoice}`;
    m.style.backgroundColor = "red";
  }
  else {
    console.log("You win!");
    userscore++;
    m.innerText = `You win! ${userchoice} beats ${compchoice}`;
    m.style.backgroundColor = "green";
  }
};

const updatescore = () => {
  let u = document.querySelector("#user-score");
  u.innerText = userscore;
  let c = document.querySelector("#comp-score");
  c.innerText = compscore;
};

  
 
