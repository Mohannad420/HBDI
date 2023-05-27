//selectors
const todoBtn = document.querySelector(".todo-button");
const todoInput = document.querySelector(".todo-input");
const todoList = document.querySelector(".todo-list");
//event listeners
todoBtn.addEventListener("click", addTask);
todoList.addEventListener("click", checkOrDelete);

//functions
function addTask(e) {
  e.preventDefault(); // to prevent the form from submitting

  //create li
  const todoli = document.createElement("li");
  todoli.classList.add("todo");

  //create div
  const tododiv = document.createElement("div");
  tododiv.classList.add("todo-item");

  //add input value to div
  tododiv.innerText = todoInput.value;

  // create button complete
  const completeBtn = document.createElement("button");
  completeBtn.classList.add("complete-btn");
  completeBtn.innerHTML = '<i class="fas fa-check"></i>';

  //create trash buttton
  const trashBtn = document.createElement("button");
  trashBtn.classList.add("trash-btn");
  trashBtn.innerHTML = '<i class="fas fa-trash"></i>';

  //add div + button 1 + button 2 -> li
  todoli.appendChild(tododiv);
  todoli.appendChild(completeBtn);
  todoli.appendChild(trashBtn);

  //add li to ul
  todoList.appendChild(todoli);

  // remove input value
  todoInput.value = "";
}

function checkOrDelete(e) {
  const item = e.target;

  if (item.classList[0] === "complete-btn") {
    const todo = item.parentElement;
    todo.classList.toggle("completed");
  }

  if (item.classList[0] === "trash-btn") {
    const todo = item.parentElement;
    todo.classList.toggle("fall");
    todo.addEventListener("transitionend", () => {
      todo.remove();
    });
  }
}