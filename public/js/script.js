const profileBtn = document.querySelector("#profile-dropdown");
const profilSvgIcon = document.querySelector("#dropdown-icon");
const profileMenu = document.querySelector("#profile-dropdown-menu");

profileBtn.addEventListener("click", () => {
    profilSvgIcon.classList.toggle("rotate-180");
    profileMenu.classList.toggle("hidden");
});
