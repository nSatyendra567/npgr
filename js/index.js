const element1 = document.getElementById("list_id");
const list1 = document.getElementById("list");
const element2 = document.getElementById("list_id2");
const list2 = document.getElementById("list2");

if (!element1 || !list1 || !element2 || !list2) {
  console.error('One or more elements/lists not found.');
} else {
  let hideTimeout1, hideTimeout2;

  const showList1 = () => {
    if (hideTimeout1) {
      clearTimeout(hideTimeout1);
      hideTimeout1 = null;
    }
    list1.classList.remove('hidden');
    list2.classList.add('hidden');
  };

  const hideList1 = () => {
    hideTimeout1 = setTimeout(() => {
      list1.classList.add('hidden');
    }, 500);
  };

  const showList2 = () => {
    if (hideTimeout2) {
      clearTimeout(hideTimeout2);
      hideTimeout2 = null;
    }
    list2.classList.remove('hidden');
    list1.classList.add('hidden');
  };

  const hideList2 = () => {
    hideTimeout2 = setTimeout(() => {
      list2.classList.add('hidden');
    }, 500);
  };

  element1.addEventListener('mouseover', showList1);
  list1.addEventListener('mouseover', showList1);
  element1.addEventListener('mouseleave', hideList1);
  list1.addEventListener('mouseleave', hideList1);

  element2.addEventListener('mouseover', showList2);
  list2.addEventListener('mouseover', showList2);
  element2.addEventListener('mouseleave', hideList2);
  list2.addEventListener('mouseleave', hideList2);
}


document.getElementById("showme").addEventListener("click", function() {
  const navMenu = document.getElementById("nav_menu");
  navMenu.classList.toggle("hidden");
  navMenu.classList.toggle("flex");
  console.log("toggling");
});
