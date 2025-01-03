<style>
    .instructions{
        color:white;
        text-align:center;
    }
    .capital-container {
      padding: 15px;
      border-radius: 5px;
      background-color: black;
      color: white;
    }
    .capital-input button {
      padding: 5px 10px;
      font-size: 14px;
    }
    .capital-input input {
      width: 100px;
      height: 30px;
      text-align: center;
      font-size: 14px;
      color: white;
      background-color: black;
    }
    table {
      width: 100%;
      color: white;
      border-collapse: collapse;
    }
    table td {
      padding: 10px;
      border: 1px solid #D4AF37;
      text-align: center;
      font-size: 18px;
    }
    
    .price {
        background-color: #523600;
    }
    .save-btn, .reset-btn {
      background-color: #D4AF37;
      color: black;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
    }
    .saved-message {
      color: #D4AF37;
      font-size: 16px;
      font-weight: bold;
    }
  </style>
<script>
    window.setTimeout( function() {
  window.location.reload();
}, 5000);
window.onload = function () {
  const totalCapitalInput = document.getElementById('totalCapital');
  const saveButton = document.getElementById('saveButton');
  const decreaseButton = document.getElementById('decreaseButton');
  const increaseButton = document.getElementById('increaseButton');
  const resetButton = document.getElementById('resetButton');
  const savedMessage = document.getElementById('savedMessage');

  // Placeholder variables for dynamic conditions
  let isSellAEmpty = <?=$sell_empty?>; // Update dynamically in your implementation
  let isBuyANotEmpty = true; // Update dynamically in your implementation
    console.log(isSellAEmpty);
  // Check if saved value exists in localStorage
  const savedCapital = localStorage.getItem('totalCapital');

  if (savedCapital) {
    // Capital has been saved
    totalCapitalInput.value = savedCapital;
    const equalShare = Math.floor(savedCapital / 4);
    document.getElementById('buyA').textContent = equalShare;
    document.getElementById('buyB').textContent = equalShare;
    document.getElementById('buyC').textContent = equalShare;
    document.getElementById('buyD').textContent = equalShare;

    if (isSellAEmpty && !isBuyANotEmpty) {
      // Lock inputs if `sellA` is empty and `buyA` is not empty
      lockCapitalInputs();
    } else if (!isSellAEmpty && isBuyANotEmpty) {
      // Reset capital if both `sellA` and `buyA` are not empty
      resetCapital();
    } else {
      // Keep inputs locked if neither condition is met
      lockCapitalInputs();
    }
  } else {
    // Capital has not been saved: allow modifications
    enableCapitalInputs();
  }
};

function changeValue(amount) {
  const totalCapitalInput = document.getElementById('totalCapital');
  let currentValue = parseInt(totalCapitalInput.value, 10);

  // Update the capital value
  currentValue += amount;
  if (currentValue >= 0) {
    totalCapitalInput.value = currentValue;

    // Calculate the new values for each buy (Capital / 4)
    const equalShare = Math.floor(currentValue / 4);

    // Update the displayed values
    document.getElementById('buyA').textContent = equalShare;
    document.getElementById('buyB').textContent = equalShare;
    document.getElementById('buyC').textContent = equalShare;
    document.getElementById('buyD').textContent = equalShare;
  }
}

function saveCapital() {
  const totalCapitalInput = document.getElementById('totalCapital');

  // Save value in localStorage
  localStorage.setItem('totalCapital', totalCapitalInput.value);

  // Lock inputs and show saved message
  lockCapitalInputs();
}

function resetCapital() {
  const totalCapitalInput = document.getElementById('totalCapital');

  // Clear saved value from localStorage
  localStorage.removeItem('totalCapital');

  // Reset capital value and enable inputs
  totalCapitalInput.value = 10000;
  const equalShare = Math.floor(10000 / 4);
  document.getElementById('buyA').textContent = equalShare;
  document.getElementById('buyB').textContent = equalShare;
  document.getElementById('buyC').textContent = equalShare;
  document.getElementById('buyD').textContent = equalShare;

  enableCapitalInputs();
}

// Helper function to lock inputs
function lockCapitalInputs() {
  const totalCapitalInput = document.getElementById('totalCapital');
  const saveButton = document.getElementById('saveButton');
  const decreaseButton = document.getElementById('decreaseButton');
  const increaseButton = document.getElementById('increaseButton');
  const resetButton = document.getElementById('resetButton');
  const savedMessage = document.getElementById('savedMessage');

  totalCapitalInput.setAttribute('readonly', true);
  saveButton.disabled = true;
  decreaseButton.disabled = true;
  increaseButton.disabled = true;
  resetButton.style.display = 'none';
  savedMessage.style.display = 'block';
}

// Helper function to enable inputs
function enableCapitalInputs() {
  const totalCapitalInput = document.getElementById('totalCapital');
  const saveButton = document.getElementById('saveButton');
  const decreaseButton = document.getElementById('decreaseButton');
  const increaseButton = document.getElementById('increaseButton');
  const resetButton = document.getElementById('resetButton');
  const savedMessage = document.getElementById('savedMessage');

  totalCapitalInput.removeAttribute('readonly');
  saveButton.disabled = false;
  decreaseButton.disabled = false;
  increaseButton.disabled = false;
  resetButton.style.display = 'inline-block';
  savedMessage.style.display = 'none';
}



</script>
