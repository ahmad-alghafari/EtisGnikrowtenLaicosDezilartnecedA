const form = document.getElementById("post_form");
const textInput = form.querySelector('input[type="text"]');
const file = form.querySelector('input[id="file"]');
const photo = form.querySelector('input[id="photo"]');
const video = form.querySelector('input[id="video"]');
const submitButton = form.querySelector('input[type="submit"]');

form.addEventListener('input', () => {
    if (textInput.value || file.value || photo.value || video.value) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
});

