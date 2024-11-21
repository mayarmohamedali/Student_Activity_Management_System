
  document.addEventListener("DOMContentLoaded", () => {
  const stars = document.querySelectorAll(".stars i");
  const submitBtn = document.querySelector(".submit-btn");
  const modal = document.getElementById("thankYouModal");
  const closeModalBtn = document.querySelector(".close-btn");
  let submitted = false;

  // Star rating logic
  stars.forEach((star, index1) => {
    star.addEventListener("click", () => {
      if (!submitted) {
        stars.forEach((star, index2) => {
          index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
      }
    });
  });

  // Submit button logic to show the modal
  submitBtn.addEventListener("click", () => {
    if (!submitted) {
      submitted = true;
      modal.style.display = "flex"; // Show the modal
    }
  });

  // Close modal button logic and redirect to index.html
  closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
    // Redirect to index.html
    window.location.href = "indexForStudents.php";
  });
});

