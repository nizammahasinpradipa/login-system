function showForm(formId) {
    document.querySelectorAll(".main").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}