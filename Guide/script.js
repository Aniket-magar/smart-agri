// Crops Data
const cropsData = {
    rabi: [
        { name: "Wheat", image: "wheat.jpg", info: "Wheat is a staple food grain rich in carbohydrates and protein, commonly used for making flour and bread." },
        { name: "Barley", image: "barley.jpg", info: "Barley is widely used for animal feed, brewing beer, and making health foods rich in fiber." },
        { name: "Mustard", image: "mustard.jpg", info: "Mustard seeds are used for oil extraction and seasoning in various cuisines, known for their pungent flavor." },
        { name: "Peas", image: "peas.jpg", info: "Green peas are rich in vitamins and protein, commonly used in soups, curries, and frozen vegetables." },
        { name: "Chickpeas", image: "chickpeas.jpg", info: "Chickpeas are rich in protein and used in various dishes worldwide, including hummus and curries." },
        { name: "Lentils", image: "lentils.jpg", info: "Lentils are a high-protein legume used in soups, stews, and vegetarian dishes." },
        { name: "Oats", image: "oats.jpg", info: "Oats are a whole grain used for making oatmeal and breakfast cereals." },
        { name: "Linseed", image: "linseed.jpg", info: "Linseed (flaxseed) is rich in omega-3 fatty acids and used in health foods and oil extraction." }
    ],
    kharif: [
        { name: "Rice", image: "rice.jpg", info: "Rice is a primary food source for over half the world's population, rich in carbohydrates." },
        { name: "Maize", image: "maize.jpg", info: "Maize (corn) is used for human consumption, animal feed, and as a raw material in many industries." },
        { name: "Cotton", image: "cotton.jpg", info: "Cotton is the world's most important natural fiber, used for making textiles and clothing." },
        { name: "Soybean", image: "soybean.jpg", info: "Soybeans are a major source of protein and oil, used in food products, animal feed, and industrial applications." },
        { name: "Sorghum", image: "sorghum.jpg", info: "Sorghum is a drought-resistant cereal grain used for food, fodder, and biofuel production." },
        { name: "Pigeon Pea", image: "pigeonpea.jpg", info: "Pigeon pea is a protein-rich legume widely consumed in tropical and subtropical regions." },
        { name: "Groundnut", image: "groundnut.jpg", info: "Groundnuts (peanuts) are used for making oil, peanut butter, and snacks." },
        { name: "Millets", image: "millets.jpg", info: "Millets are small-seeded grains rich in nutrients, grown in dry regions for food and fodder." }
    ]
};

// Farming Tools Data
const toolsData = [
    { name: "Hand Weeder", image: "handweeder.jpg", info: "Used to remove weeds easily from the soil, reducing manual labor and maintaining soil health." },
    { name: "Farmer Safer Kit", image: "farmerSafetykit .jpg", info: "Includes protective gear like gloves, masks, and goggles for safe pesticide handling." },
    { name: "Plough", image: "plough.jpg", info: "Used for initial soil preparation, breaking up hard soil, and mixing organic matter." },
    { name: "Seed Drill", image: "seeddrill.jpg", info: "Ensures uniform seed planting, improving crop yield and reducing wastage." },
    { name: "Sprayer", image: "sprayer.jpg", info: "Used for applying fertilizers, pesticides, and herbicides evenly across crops." },
    { name: "Harrow", image: "harrow.jpg", info: "Breaks up clumps of soil after ploughing, preparing a finer seedbed." },
    { name: "Sickle", image: "sickle.jpg", info: "A hand-held tool used for harvesting crops, especially grains and grass." },
    { name: "Tractor", image: "tractor.jpg", info: "A powerful vehicle used for pulling or pushing agricultural machinery and transporting goods." }
];

// Function to display crops
function showCrops(season) {
    const modalContent = document.getElementById("modalContent");
    modalContent.innerHTML = "";

    let row;
    cropsData[season].forEach((crop, index) => {
        if (index % 4 === 0) { // Start a new row after every 4 items
            row = document.createElement("div");
            row.classList.add("row", "mb-3");
            modalContent.appendChild(row);
        }

        const cropCard = document.createElement("div");
        cropCard.classList.add("col-md-3", "mb-3");

        cropCard.innerHTML = `
            <div class="card">
                <img src="${crop.image}" class="card-img-top" alt="${crop.name}">
                <div class="card-body">
                    <h5 class="card-title">${crop.name}</h5>
                    <p class="card-text">${crop.info}</p>
                </div>
            </div>
        `;

        row.appendChild(cropCard);
    });

    new bootstrap.Modal(document.getElementById("infoModal")).show();
}

// Function to display farming tools (4 per row)
function loadFarmingTools() {
    const toolsContainer = document.getElementById("toolsContainer");
    toolsContainer.innerHTML = "";

    let row;
    toolsData.forEach((tool, index) => {
        if (index % 4 === 0) { // Start a new row after every 4 tools
            row = document.createElement("div");
            row.classList.add("row", "mb-3");
            toolsContainer.appendChild(row);
        }

        const toolCard = document.createElement("div");
        toolCard.classList.add("col-md-3", "mb-3");

        toolCard.innerHTML = `
            <div class="card" onclick="showToolInfo('${tool.name}')">
                <img src="${tool.image}" class="card-img-top" alt="${tool.name}">
                <div class="card-body">
                    <h5 class="card-title">${tool.name}</h5>
                </div>
            </div>
        `;

        row.appendChild(toolCard);
    });
}

// Function to show tool info in modal
function showToolInfo(toolName) {
    const tool = toolsData.find(t => t.name === toolName);
    const modalContent = document.getElementById("modalContent");

    modalContent.innerHTML = `
        <div class="text-center">
            <img src="${tool.image}" class="img-fluid mb-3" alt="${tool.name}">
            <h3>${tool.name}</h3>
            <p>${tool.info}</p>
        </div>
    `;

    new bootstrap.Modal(document.getElementById("infoModal")).show();
}

// Load tools on page load
window.onload = loadFarmingTools;
// Function to show tool info in modal with a smaller image and more details
function showToolInfo(toolName) {
    const tool = toolsData.find(t => t.name === toolName);
    const modalContent = document.getElementById("modalContent");

    modalContent.innerHTML = `
        <div class="text-center">
            <img src="${tool.image}" class="img-fluid mb-3" alt="${tool.name}" style="width: 150px; height: auto;">
            <h3>${tool.name}</h3>
            <p>
                ${tool.info} <br>
                It is widely used by farmers to enhance productivity and efficiency. <br>
                This tool is made of durable material ensuring long-term usability. <br>
                Suitable for various types of soil and farming techniques. <br>
                Helps in reducing manual effort and optimizing agricultural processes.
            </p>
        </div>
    `;

    new bootstrap.Modal(document.getElementById("infoModal")).show();
}
