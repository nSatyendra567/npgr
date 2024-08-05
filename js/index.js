const element1 = document.getElementById("list_id");
const list1 = document.getElementById("list");
const element2 = document.getElementById("list_id2");
const list2 = document.getElementById("list2");

const element11 = document.getElementById("mlist_id");
const list11 = document.getElementById("mlist");
const element22 = document.getElementById("mlist_id2");
const list22 = document.getElementById("mlist2");

if (!element1 || !list1 || !element2 || !list2) {
  console.error('One or more elements/lists not found.');
} else {
  let hideTimeout1, hideTimeout2;
  let hideTimeout11, hideTimeout22;

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

  const showList11 = () => {
    list11.classList.remove('hidden');
    list22.classList.add('hidden');
  };

  const hideList11 = () => {
    list11.classList.add('hidden');
  };

  const showList22 = () => {
    list22.classList.remove('hidden');
    list11.classList.add('hidden');
  };

  const hideList22 = () => {
    list22.classList.add('hidden');
  };

  // Mouseover event listeners
  element1.addEventListener('mouseover', showList1);
  list1.addEventListener('mouseover', showList1);
  element1.addEventListener('mouseleave', hideList1);
  list1.addEventListener('mouseleave', hideList1);

  element2.addEventListener('mouseover', showList2);
  list2.addEventListener('mouseover', showList2);
  element2.addEventListener('mouseleave', hideList2);
  list2.addEventListener('mouseleave', hideList2);

  // Click event listeners
  element11.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent event bubbling
    // console.log("here1");
    if (list11.classList.contains('hidden')) {
      showList11();
    } else {
      hideList11();
    }
    hideList22(); // Ensure list2 is hidden
  });

  element22.addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent event bubbling
    // console.log("here2");
    if (list22.classList.contains('hidden')) {
      showList22();
    } else {
      hideList22();
    }
    hideList11(); // Ensure list1 is hidden
  });
}

// Toggling nav menu
document.getElementById("showme").addEventListener("click", function(event) {
  event.stopPropagation(); // Prevent event bubbling
  const navMenu = document.getElementById("nav_menu");
  navMenu.classList.toggle("hidden");
  navMenu.classList.toggle("flex");
  // console.log("toggling");
});
