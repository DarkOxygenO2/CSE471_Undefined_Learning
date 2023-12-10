<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        video {
            width: 100%;
            max-width: 800px;
            height: auto;
            display: block;
            margin: 20px auto;
        }

        .comments-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #commentList {
            list-style: none;
            padding: 0;
        }

        #commentList li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        #commentForm {
            display: flex;
            margin-top: 20px;
        }

        #comment {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 8px;
        }

        #submitComment {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        #feedbackBtn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #feedbackForm {
            display: none;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #submitFeedback {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Video Page</h1>
    </header>
    @auth

    <video controls>
        <source src="{{ asset('D:\0\University\Laravel\custom_login\storage\video.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="comments-container">
        <h2>Comments</h2>
        <ul id="commentList"></ul>

        <form id="commentForm">
            <input type="text" id="comment" name="comment" placeholder="Add a comment..." required>
            <button type="button" id="submitComment" onclick="addComment()">Submit</button>
        </form>
    </div>

    <button id="feedbackBtn" onclick="showFeedbackForm()">Feedback</button>

    <div id="feedbackForm">
        <h2>Feedback Form</h2>
        <textarea id="feedbackText" placeholder="Write your feedback..." oninput="enableSubmitButton()"></textarea>
        <button type="button" id="submitFeedback" onclick="submitFeedback()" disabled>Submit Feedback</button>
    </div>

    <script>
        function addComment() {
            var comment = document.getElementById('comment').value;
            var commentList = document.getElementById('commentList');
            var listItem = document.createElement('li');
            listItem.appendChild(document.createTextNode(comment));
            commentList.appendChild(listItem);
            document.getElementById('commentForm').reset();
        }

        function showFeedbackForm() {
            document.getElementById('feedbackForm').style.display = 'block';
        }

        function enableSubmitButton() {
            var feedbackText = document.getElementById('feedbackText').value;
            var submitFeedbackButton = document.getElementById('submitFeedback');
            submitFeedbackButton.disabled = feedbackText.trim() === ''; 
        }

        function submitFeedback() {
            alert('Feedback submitted!');
            document.getElementById('feedbackForm').style.display = 'none';
        }
    </script>
    @else
        <center>
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="text-center display-4">To view the video, you must log in</h1>
            </div>
        </center>
    @endauth

</body>
</html>