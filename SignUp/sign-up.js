const talukaData = {
    "Chh.sabhajinagar": ["Kannad", "Khultabad"]
};

const villageData = {
    "Kannad": [
        "Ajantha", "Chapaner", "Phardapur", "Wadod Bazar", "BalaGhat", 
        "Chinchkheda", "Shivrai", "Golegaon", "Jambhala", "Narayanpur"
    ],
    "Khultabad": [
        "Ellora", "Ghrushneshwar", "Verul", "Bham", "Ranjangaon", 
        "Padali", "Nandgaon", "Daulatabad", "Jategaon", "Khardekhi"
    ]
};

function updateTaluka() {
    const district = document.getElementById("inputdist").value;
    const talukaSelect = document.getElementById("inputtaluka");

    talukaSelect.innerHTML = '<option value="Selecttaluka">Select Taluka</option>';

    if (district in talukaData) {
        talukaData[district].forEach(taluka => {
            const option = document.createElement("option");
            option.value = taluka;
            option.text = taluka;
            talukaSelect.appendChild(option);
        });
    }
}

function updateVillage() {
    const taluka = document.getElementById("inputtaluka").value;
    const villageSelect = document.getElementById("inputvillage");

    villageSelect.innerHTML = '<option value="Selectvillage">Select village</option>';

    if (taluka in villageData) {
        villageData[taluka].forEach(village => {
            const option = document.createElement("option");
            option.value = village;
            option.text = village;
            villageSelect.appendChild(option);
        });
    }
}

// Form validation function
function validateForm(event) {
    event.preventDefault(); // Prevent form submission if validation fails

    let isValid = true;

    const fullName = document.getElementById("name").value.trim();
    const mobile = document.getElementById("Mobile").value.trim();
    const address = document.getElementById("address").value.trim();
    const password = document.getElementById("password").value;
    const retypePassword = document.getElementById("retype_password").value;
    const landArea = document.getElementById("land_area").value.trim();
    const district = document.getElementById("inputdist").value;
    const taluka = document.getElementById("inputtaluka").value;
    const village = document.getElementById("inputvillage").value;

    // Helper function to show error messages
    function showError(id, message) {
        document.getElementById(id).innerText = message;
        document.getElementById(id).style.color = "red";
    }

    function clearError(id) {
        document.getElementById(id).innerText = "";
    }

    // Validate Full Name
    if (fullName.length < 3) {
        showError("name_error", "Full Name must be at least 3 characters.");
        isValid = false;
    } else {
        clearError("name_error");
    }

    // Validate Mobile Number
    if (!/^[6-9]\d{9}$/.test(mobile)) {
        showError("mobile_error", "Enter a valid 10-digit mobile number.");
        isValid = false;
    } else {
        clearError("mobile_error");
    }

    // Validate Address
    if (address.length < 5) {
        showError("address_error", "Address must be at least 5 characters.");
        isValid = false;
    } else {
        clearError("address_error");
    }

    // Validate Password
    if (password.length < 6) {
        showError("password_error", "Password must be at least 6 characters.");
        isValid = false;
    } else {
        clearError("password_error");
    }

    // Validate Retype Password
    if (password !== retypePassword) {
        showError("retype_password_error", "Passwords do not match.");
        isValid = false;
    } else {
        clearError("retype_password_error");
    }

    // Validate Land Area
    if (isNaN(landArea) || landArea <= 0) {
        showError("land_area_error", "Enter a valid land area (in acres).");
        isValid = false;
    } else {
        clearError("land_area_error");
    }

    // Validate Dropdown Selections
    if (district === "Selectdist") {
        showError("district_error", "Please select a district.");
        isValid = false;
    } else {
        clearError("district_error");
    }

    if (taluka === "Selecttaluka") {
        showError("taluka_error", "Please select a taluka.");
        isValid = false;
    } else {
        clearError("taluka_error");
    }

    if (village === "Selectvillage") {
        showError("village_error", "Please select a village.");
        isValid = false;
    } else {
        clearError("village_error");
    }

    if (isValid) {
        document.querySelector("form").submit();
    }
}

// Attach validation function to form submission
document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", validateForm);
});
