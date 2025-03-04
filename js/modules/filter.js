export function filterCategories() {
  const categoryBtns = document.querySelectorAll('.filter-button');
  const allContent = document.querySelectorAll('.projects-project');

  function handleCategory(event) {
    event.preventDefault();
    const category = event.target.dataset.category;
    console.log(category);
    showContent(category);
  }

  function showContent(category) {
    allContent.forEach(project => {
        if (category === "all" || project.dataset.category === category) {
            project.style.visibility = "visible";
            project.style.opacity = "1";
            project.style.position = "relative";
        } else {
            project.style.visibility = "hidden";
            project.style.opacity = "0";
            project.style.position = "absolute";
        }
    });
  }

  categoryBtns.forEach(btn => {
    btn.addEventListener('click', handleCategory);
  })
};