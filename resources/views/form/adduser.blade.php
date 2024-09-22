<div class="container">
    <h2>College Registration Form</h2>
    <form action="adduser" method="POST">
        @csrf
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" />
        <span style="color: red;">@error('first_name'){{$message}}@enderror</span>
        
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" />
        <span style="color: red;">@error('last_name'){{$message}}@enderror</span>

        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" />
        <span style="color: red;">@error('email'){{$message}}@enderror</span>
        

        <label for="password">Password</label>
        <input type="password" id="password" name="password" />
        <span style="color: red;">@error('password'){{$message}}@enderror</span>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" />

        <!-- Academic Information -->
        <label for="program">Program of Study</label>
        <select id="program" name="program" >
            <option value="">Select a program</option>
            <option value="computer_science">Computer Science</option>
            <option value="engineering">Engineering</option>
            <option value="business">Business</option>
            <option value="arts">Arts</option>
            <option value="medicine">Medicine</option>
        </select>

        <label for="enrollment_year">Enrollment Year</label>
        <input type="text" id="enrollment_year" name="enrollment_year" >

        <!-- Address Information -->
        <label for="address">Address</label>
        <input type="text" id="address" name="address" >

        <label for="city">City</label>
        <input type="text" id="city" name="city" >

        <label for="state">State</label>
        <input type="text" id="state" name="state" >

        <label for="zip_code">Zip Code</label>
        <input type="text" id="zip_code" name="zip_code" >
        <span style="color: red;">@error('zip_code'){{$message}}@enderror</span>

        <!-- Submit Button -->
        <input type="submit" value="Register">
    </form>
</div>


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>