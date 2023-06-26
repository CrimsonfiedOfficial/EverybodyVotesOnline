function fetchPollSuggestions() {
    return fetch('poll-suggestions.json')
      .then(response => response.json())
      .then(data => data)
      .catch(error => console.error('Error fetching poll suggestions:', error));
  }
  
  function displayPollSuggestions() {
    fetchPollSuggestions()
      .then(pollSuggestions => {
        const pollSuggestionsList = document.getElementById('pollSuggestions');
        pollSuggestionsList.innerHTML = '';
  
        pollSuggestions.forEach(suggestion => {
          const listItem = document.createElement('li');
          listItem.textContent = suggestion.question;
          pollSuggestionsList.appendChild(listItem);
        });
      });
  }
  
  displayPollSuggestions();
  