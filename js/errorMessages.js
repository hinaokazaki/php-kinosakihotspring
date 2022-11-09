// - errorMessages.js
// This script defines functions for adding and removing error messages.

// This function adds the error message.
// It takes two arguments: the form element ID and the message.
function addErrorMessage(id, msg) {
   	'use strict';
    
    // Get the form element reference:
    var elem = document.getElementById(id);
    
    // Define the new span's ID value:
    var newId = id + 'Error';
    
    // Check for the existence of the span:
    var span = document.getElementById(newId);
    if (span) {
        span.firstChild.value = msg; // Update
    } else { // Create new.
    
        // Create the span:
        span = document.createElement('span');
        span.id = newId;
		span.className = 'error';
        span.appendChild(document.createTextNode(msg));
        
        // Add the span to the parent:
        elem.parentNode.appendChild(span);
		elem.previousSibling.innerText = "X " + elem.previousSibling.innerText;
        elem.previousSibling.className = 'error';

    } // End of main IF-ELSE.

} // End of addErrorMessage() function.

// This function removes the error message.
// It takes one argument: the form element ID.
function removeErrorMessage(id) {
   	'use strict';

    // Get a reference to the span:
    var span = document.getElementById(id + 'Error');
	if (span) {
    
	    // Remove the class from the label:
	    span.previousSibling.previousSibling.className = null;
    
	    // Remove the span:
	    span.parentNode.removeChild(span);

	} // End of IF.
    
} // End of removeErrorMessage() function.

// - correctMessages.js
// This script defines functions for adding and removing correct messages.

// This function adds the correct message.
// It takes two arguments: the form element ID and the message.
function addcorrectMessage(id, labelmsg) {
   	'use strict';
	
	var msg = '✓';
    
    // Get the form element reference:
    var elem = document.getElementById(id);
    
    // Define the new span's ID value:
    var newId = id + 'correct';
    
    // Check for the existence of the span:
    var span = document.getElementById(newId);
    if (span) {
        span.firstChild.value = msg; // Update
    } else { // Create new.
    
        // Create the span:
        span = document.createElement('span');
        span.id = newId;
		span.className = 'correct';
        span.appendChild(document.createTextNode(msg));
        
        // Add the span to the parent:
        elem.parentNode.appendChild(span);
        elem.previousSibling.className = 'correct';
		elem.previousSibling.innerHTML = labelmsg;

    } // End of main IF-ELSE.

} // End of addcorrectMessage() function.

// This function removes the error message.
// It takes one argument: the form element ID.
function removecorrectMessage(id) {
   	'use strict';

    // Get a reference to the span:
    var span = document.getElementById(id + 'correct');
	if (span) {
    
	    // Remove the class from the label:
	    span.previousSibling.previousSibling.className = null;
    
	    // Remove the span:
	    span.parentNode.removeChild(span);

	} // End of IF.
    
} // End of removecorrectMessage() function.