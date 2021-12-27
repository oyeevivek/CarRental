function showForm(radio){
    var carListTable = document.getElementById('carListTable');
    var addNewCarForm = document.getElementById('addNewCarForm');
    if(radio.value === 'carList'){
        carListTable.style.display = "block";
        addNewCarForm.style.display = "none";
    }
    else if(radio.value === 'addNewCars'){
        carListTable.style.display = "none";
        addNewCarForm.style.display = "block";
    }
  }

function edit(details){
    details = details.value;
    var carDetails = details.split("+");
    var editCar = document.getElementById('editCar');
    editCar.style.display = "block";
    document.getElementById('id').value = carDetails[0];
    document.getElementById('vmodel').value = carDetails[1];
    document.getElementById('vnum').value = carDetails[2];
    document.getElementById('scap').value = carDetails[3];
    document.getElementById('rpd').value = carDetails[4];
}

function book(){
    var availableCarListTable = document.getElementById('availableCarListTable');
    availableCarListTable.style.display = "block";
}
