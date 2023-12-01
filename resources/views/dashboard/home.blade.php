<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Height Textarea</title>
    <style>
        /* Apply some basic styles for the textarea */
        #dynamic-textarea {
            padding: 8px;
            resize: vertical;
            /* Allow vertical resizing */
        }

    </style>
</head>
<body>

    <textarea id="dynamic-textarea" oninput="autoAdjustHeight(this)"></textarea>

    <script>
        // JavaScript function to adjust the height of the textarea dynamically
        function autoAdjustHeight(textarea) {
            textarea.style.height = 'auto'; // Reset the height to auto
            textarea.style.height = textarea.scrollHeight + 'px'; // Set the height to fit the content
        }

    </script>

</body>
</html>
