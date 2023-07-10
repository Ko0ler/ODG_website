// Function to check if user has scrolled to the bottom
function isScrollAtBottom() {
    // Get the height of the entire document
    const documentHeight = Math.max(
      document.body.scrollHeight,
      document.documentElement.scrollHeight,
      document.body.offsetHeight,
      document.documentElement.offsetHeight,
      document.documentElement.clientHeight
    );
  
    // Get the current scroll position
    const scrollPosition = window.innerHeight + window.pageYOffset;
  
    // Check if the user has scrolled to the bottom of the page
    return scrollPosition >= documentHeight;
  }
  
  // Function to prompt user input when scrolled to the bottom
  function promptOnScroll() {
    if (isScrollAtBottom()) {
      const userInput = prompt('Please provide your input:');
      // Do something with the user input
      console.log('User input:', userInput);
    }
  }
  
  // Attach the 'scroll' event listener to the window
  window.addEventListener('scroll', promptOnScroll);
  