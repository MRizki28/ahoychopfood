function validationInformation() {
    const title = document.getElementById("title");
    const imgInformation = document.getElementById("img_information");

    const setError = (u, msg) => {
        const parentBox = u.parentElement;
        parentBox.classList.add("has-error");
        const span = parentBox.querySelector("span");
        span.innerText = msg;
    };

    const setSuccess = (u) => {
        const parentBox = u.parentElement;
        parentBox.classList.remove("has-error");
        parentBox.classList.add("has-success");
        const span = parentBox.querySelector("span");
        span.innerText = "";
    };

    const setSuccessDescription = (u) => {
        const parentBox = u.parentElement;
        parentBox.classList.remove("has-error");
        parentBox.classList.remove("description-border-validation");
        parentBox.classList.add("has-success");
        parentBox.classList.add("description-border-validation-success");
        const span = document.querySelector(".error-description");
        span.innerText = "";
    };

    const setErrorDescription = (u, msg) => {
        const parentBox = u.parentElement;
        parentBox.classList.add("description-border-validation");
        parentBox.classList.remove("description-border-validation-success");
        parentBox.classList.add("has-error");
        const span = document.querySelector(".error-description");
        span.innerText = msg;
    };

    const validateTitle = () => {
        const titleValue = title.value.trim();
        if (titleValue == "") {
            setError(title, "Field ini wajib diisi !");
        } else {
            setSuccess(title);
        }
    };

    const validateImage = () => {
        const imgMenuFile = imgInformation.files[0];
        if (!imgMenuFile) {
            setError(imgInformation, "Field ini wajib diisi !");
        } else {
            const allowedExtensions = ["jpg", "jpeg", "png", "webp"];
            const imgExtension = imgMenuFile.name.split(".").pop().toLowerCase();
            if (!allowedExtensions.includes(imgExtension)) {
                setError(imgInformation, "Format only JPG,JPEG,PNG,WEBP");
            } else {
                setSuccess(imgInformation);
            }
        }
    };


    const validationDescription = () => {
        const descriptionElement = document.querySelector(".note-editable.card-block");
        const descriptionValue = descriptionElement.textContent.trim();
        const inputDescriptionElement = document.querySelector(".input-description");
    
        if (descriptionValue === "") {
            setErrorDescription(inputDescriptionElement, "Field ini wajib diisi !");
        } else {
            setSuccessDescription(inputDescriptionElement);
        }
    };

    validateTitle();
    validateImage();
    validationDescription();

    title.addEventListener('input', validateTitle);
    imgInformation.addEventListener('change', validateImage);
    document.querySelector(".note-editable.card-block").addEventListener('input', validationDescription);

}