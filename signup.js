    // Function to populate dropdown options
    function populateDropdown(selectElement, options) {
        selectElement.innerHTML = '';
        options.forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.textContent = option;
          selectElement.appendChild(optionElement);
        });
      }
  
      // Function to update barangay dropdown based on selected city/municipality
      function updateBarangay() {
        const citySelect = document.getElementById('citySelect');
        const barangaySelect = document.getElementById('barangaySelect');
        const selectedCity = citySelect.value;
        const barangays = getBarangays(selectedCity); // Implement this function to get barangays for the selected city/municipality
        populateDropdown(barangaySelect, barangays);
      }
  
      // Event listener for city/municipality dropdown change
      document.getElementById('citySelect').addEventListener('change', updateBarangay);
  
      // You can implement similar functions to update other dropdowns (province, country) based on user selection.
  
      // Initialize dropdowns
      // Example:
      // const cities = getCities(); // Implement this function to get cities/municipalities
      // populateDropdown(document.getElementById('citySelect'), cities);
  
      // You can similarly initialize other dropdowns (barangay, province, country) when the page loads.
  
      // Check if user is logged in (you can implement your own logic here)
      const isLoggedIn = true; // Set to true if user is logged in, false otherwise
  
      // Get the logout button element
      const logoutButton = document.getElementById('logoutButton');
  
      // Toggle the visibility of the logout button based on whether the user is logged in
      if (isLoggedIn) {
        logoutButton.style.display = 'block';
      } else {
        logoutButton.style.display = 'none';
      }