<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../../assests/front/css/login.css" />
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title">Forget Password?</div>
        </div>
        <div class="form-container">

        </div>
        <div class="form-inner">
            <form action="#">
                <div class="field">
                    <select name="job">
                        <option value="">Question 1</option>
                        <option value="formateur">q1</option>
                        <option value="chercheur">q2</option>
                        <option value="recruteur">q3</option>
                    </select>
                </div>
                <div class="field">
                    <input placeholder="Réponse 1" required />
                </div>
                <div class="field">
                    <select name="job">
                        <option value="">Question 2</option>
                        <option value="formateur">q4</option>
                        <option value="chercheur">q5</option>
                        <option value="recruteur">q6</option>
                    </select>
                </div>
                <div class="field">
                    <input placeholder="Réponse 2" required />
                </div>
                <div class="field">
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="../../assests/front/js/login.js"></script>
</body>

</html>