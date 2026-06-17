<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Miffy Theme</title>
    <style>
        
        body {
            background-color: #fbcbc9; 
            font-family: 'Courier New', Courier, monospace; 
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

    
        .miffy-window {
            background-color: #fefaf0; 
            width: 90%;
            max-width: 650px;
            border: 3px solid #000000; 
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 8px 8px 0px #000000; 
            margin: 40px 20px;
        }

  
        .window-header {
            background-color: #fefaf0;
            border-bottom: 3px solid #000000;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            position: relative;
        }

 
        .window-buttons {
            display: flex;
            gap: 6px;
        }
        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 2px solid #000;
        }
        .dot-red { background-color: #ff5f56; }
        .dot-yellow { background-color: #ffbd2e; }
        .dot-green { background-color: #27c93f; }

      
        .window-icon-area {
            position: absolute;
            right: 20px;
            display: flex;
            align-items: center;
        }

        .window-content {
            padding: 30px;
            text-align: center;
        }


        h1 {
            font-size: 2.2rem;
            margin: 10px 0;
            color: #000000;
            font-weight: bold;
        }

        .profile-frame {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #000000;
            background-color: #ffffff;
            margin: 15px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

  
        .section-title {
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 30px;
            margin-bottom: 10px;
            text-align: left;
            border-bottom: 2px solid #000;
            padding-bottom: 3px;
        }

        .info-box {
            text-align: left;
            background-color: #ffffff;
            border: 2px solid #000000;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
            line-height: 1.5;
            font-size: 0.9rem;
        }

     
        .cv-section {
            text-align: left;
            margin-top: 10px;
        }
        .cv-item {
            margin-bottom: 12px;
            font-size: 0.9rem;
        }

       
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 15px;
        }
        .skill-badge {
            background-color: #a3c1ad; 
            color: #000000;
            padding: 6px 12px;
            border: 2px solid #000000;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: bold;
            box-shadow: 3px 3px 0px #000000;
        }

        .about-text {
            text-align: justify;
            font-size: 0.9rem;
            line-height: 1.6;
            background-color: #ffffff;
            border: 2px solid #000000;
            border-radius: 8px;
            padding: 15px;
        }

        
        .miffy-floor {
            background-color: #bad997; 
            border-top: 3px solid #000000;
            width: 100%;
            height: 40px;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>
<body>

    
    <div class="miffy-window">
        
      
        <div class="window-header">
            <div class="window-buttons">
                <div class="dot dot-red"></div>
                <div class="dot dot-yellow"></div>
                <div class="dot dot-green"></div>
            </div>
            <div class="window-icon-area">
              
                <img src="image/miffy.png" alt="Miffy" style="width: 40px; height: 40px; object-fit: contain;">
            </div>
        </div>

        <div class="window-content">

            <div class="profile-frame">
               
                <img src="image/profile.jpg" class="profile-img">
            </div>

            <h1>Assya Sofia</h1>
            <p style="margin: 0; font-size: 0.9rem; font-weight: bold; color: #555;">Web Designer</p>

            <div class="section-title">Contact Info</div>
            <div class="info-box">
                <b>Faculty:</b> FSKM, Universiti Teknologi MARA (UiTM), 40450 Shah Alam<br>
                <b>Phone  :</b> 019 932 9709<br>
                <b>Email  :</b> asazlansaufi@email.com
            </div>

            <div class="section-title">Academic History</div>
            <div class="cv-section">
                <div class="cv-item">
                    • <b>UiTM Shah Alam</b> — Bachelor of Computer Science in Netcentric (Hons.) <br>
                    <span style="font-size: 0.8rem; color: #666;">(2025 - Present)</span>
                </div>
                <div class="cv-item">
                    • <b>Kolej Matrikulasi Selangor</b> — Physical Science <br>
                    <span style="font-size: 0.8rem; color: #666;">(2023 - 2025)</span>
                </div>
            </div>

            <div class="section-title">Skills</div>
            <div class="skills-container">
                <div class="skill-badge">HTML / CSS</div>
                <div class="skill-badge">Java Coding</div>
                <div class="skill-badge">C++</div>
                <div class="skill-badge">Multimedia</div>
            </div>

            <div class="section-title">About Me</div>
            <p class="about-text">
                Hi! Welcome to my site. I am a <b>Computer Science student</b> who loves creating <i>aesthetic front-end designs</i>. 
                My target for this semester is to get a <mark style="background-color: #fbcbc9; font-weight: bold;">dean list</mark> <sup>★</sup>. 
                Forget to mention that i love painting so much !
            </p>

            <div style="margin-top: 35px; font-size: 0.75rem; font-weight: bold; color: #000000; letter-spacing: 1px;">
                ✿ DESIGNED BY ASSYA SOFIA ✿
            </div>

        </div>
    </div>

   
    <div class="miffy-floor"></div>
</body>
</html>


