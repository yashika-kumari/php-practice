<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sample</title>
    <style>
        html, body{
            margin: 0;
            padding: 0;
            height: 100%;
        }
        table{
            border-collapse: collapse;
            border: 2px solid #444444;
            width: 100%;
            height: 100%;
            table-layout: fixed;
            background-color: #f5f5dc;
            color: #333333;
        }
        img{
            width: 100%;
            height: 100%;
        }
        p{
            text-align: justify;
            padding: 10px;
            font-size: 16px;
            color: #292929ff;
        }
        .company-name{
            text-align: center;
            font-size: 24px;
            background-color: #e6e2d3;
            padding: 10px;
            color: #222222;
            letter-spacing: 1.5px;
            font-weight: 600;
        }
         th, td {
            border: 1px solid #444444;
            padding: 8px;
        }
        th {
            background-color: #d3cec4; 
            color: #222222; 
        }
        ul li {
            color: #2d2d2dff; 
        }
        td.no-right-border {
            border-right: none;
        }
        td.no-left-border {
            border-left: none;
        }
        

    </style>
</head>
<body>
    <table border="1" width="100%">
        <tr>
            <th colspan="5" class="company-name">Ideon</th>
        </tr>
        <tr>
            <th>Home</th>
            <th>About Us</th>
            <th>Profile</th>
            <th>Sub - Domain</th>
            <th>Contact Us</th>
        </tr>
        <tr>
            <td colspan="2" class = "no-right-border">
                <p>Our company is dedicated to providing the best services and solutions to our clients, ensuring quality and satisfaction in every project we undertake. 
                    With a team of experienced professionals, we strive to innovate and lead in our industry. Our commitment to excellence drives us to continuously improve 
                    and adapt to the changing needs of our customers. We believe in building long-term relationships based on trust, integrity, and mutual success. 
                    Our portfolio includes a wide range of successful projects across various sectors, demonstrating our versatility and expertise. We prioritize customer feedback 
                    and use it to enhance our offerings, ensuring that we meet and exceed expectations. Sustainability and social responsibility are also core values that guide 
                    our business practices, reflecting our dedication to making a positive impact in the community.</p>
            </td>
            <td colspan="3" class = "no-left-border">
                <img src="Examples of AI in Customer Service (From Companies That Do It Right).jpeg" alt="Company Image" width="200" height="150">
            </td>
        </tr>
        <tr>
            <td colspan="3" class = "no-right-border">
                <ul>
                    <li>Home</li>
                    <li>About Us</li>
                    <li>Profile</li>
                    <li>Sub - Domain</li>
                    <li>Contact Us</li>
                </ul>
            </td>
            <td colspan="2" class = "no-left-border">
                <img src="Teamwork Startup Innovation.jpeg" alt="People in company creating a pyramid and holding a light bulb" width="200" height="150">
            </td>
        </tr>
    </table>
</body>
</html>