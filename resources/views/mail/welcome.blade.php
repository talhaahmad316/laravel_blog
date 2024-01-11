<h1>
        Dear {{ $name ?? 'User' }},
    </h1>
    <p>
        We wanted to take a moment to express our gratitude for your recent sign-in to our blog. Your presence is highly valued, and we're thrilled to have you as part of our community.
    </p>

    <h2>Your Sign-In Details:</h2>
    <ul>
        <li><strong>Name:</strong> {{ $name ?? 'N/A' }}</li>
        <li><strong>Email:</strong> {{ $email ?? 'N/A' }}</li>
    </ul>

    <p>
        If you have any questions, comments, or feedback, please don't hesitate to reach out. We are here to make your experience enjoyable and meaningful.
    </p>

    <p>
        Thank you once again for choosing our blog. We look forward to sharing more exciting content with you!
    </p>

    <p>
        Best regards,
        Your Blog Team
    </p>