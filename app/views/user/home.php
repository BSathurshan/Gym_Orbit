<div class="in-content">

                <div class="header">
                        <div>
                        <h2>Home</h2>
                        </div>

                        <div>
                                <button class="notification-btn" onclick="toggleNotifications()" style="background: none; border: none; cursor: pointer;">
                                🔔
                                </button>
                        </div>

                        <div id="notification-box" style="display:none; position:absolute; right:10px; top:50px; background:black; border:1px solid #ccc; padding:10px; width:300px; max-height:300px; overflow-y:auto; box-shadow:0 2px 6px rgba(0,0,0,0.2); z-index:100;">
                            <button id="close-notifications">❌</button>        
                            <!-- Notification content will be loaded here -->
                        </div>
                </div>
        <div class="in-in-content">

                <div class="container">
                <!-- Header Banner -->
                <div class="header-banner" style="background-image: url('<?= ROOT ?>/assets/images/user/home/title.jpg');">
                    <div class="banner-text">
                        <h1>TRAINING HARD<br>BE STRONG<br>BE BEAUTIFUL</h1>
                        <button>Get Detail</button>
                    </div>
                </div>

                <!-- User Info -->
                <div class="user-info">
                    <div class="info-box">60 kg<br>Weight</div>
                    <div class="info-box">5.6 Ft<br>Height</div>
                    <div class="info-box">25 years<br>Age</div>
                </div>

                <!-- Calorie Progress Section -->
                <div class="progress-container">
                    <div class="progress-box">
                        <div class="progress-circle">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 60%"></div>
                            <div class="circle-inner">1456<br>Kcal</div>
                        </div>
                        <div class="progress-details">Consumed<br>P: 10% C: 10% F: 10%</div>
                    </div>
                    <div class="progress-box">
                        <div class="progress-circle">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 80%"></div>
                            <div class="circle-inner">730<br>Kcal</div>
                        </div>
                        <div class="progress-details">Burned</div>
                    </div>
                    <div class="progress-box">
                        <div class="progress-circle">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 40%"></div>
                            <div class="circle-inner">2875<br>Kcal</div>
                        </div>
                        <div class="progress-details">Remaining</div>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="stats">
                    <div class="stat-box">
                        <div class="stat-icon">
                            <img src="<?= ROOT ?>/assets/images/user/home/heart.png" alt="Heart Rate Icon">
                        </div>
                        <h3>Heart Rate</h3>
                        <p>85 BPM</p>
                        <div class="pulse-line">
                            <svg width="60" height="20" viewBox="0 0 60 20">
                                <polyline points="0,10 10,10 15,0 20,20 25,0 30,10 40,10 45,0 50,20 55,0 60,10" stroke="#00ff00" stroke-width="2" fill="none"/>
                            </svg>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-icon">
                            <img src="<?= ROOT ?>/assets/images/user/home/energy.png" alt="Energy Burn Icon">
                        </div>
                        <h3>Energy Burn</h3>
                        <div class="progress-circle" style="width: 60px; height: 60px;">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 70%"></div>
                            <div class="circle-inner" style="width: 40px; height: 40px; top: 10px; left: 10px;">450<br>Kcal</div>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-icon">
                            <img src="<?= ROOT ?>/assets/images/user/home/treadmill.png" alt="Workout Icon">
                        </div>
                        <h3>Workout</h3>
                        <div class="progress-circle" style="width: 60px; height: 60px;">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 50%"></div>
                            <div class="circle-inner" style="width: 40px; height: 40px; top: 10px; left: 10px;">30<br>Minutes</div>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="progress-circle" style="width: 60px; height: 60px;">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 50%"></div>
                            <div class="circle-inner" style="width: 40px; height: 40px; top: 10px; left: 10px;">5/8</div>
                        </div>
                        <h3>Sleep</h3>
                        <p>hours</p>
                    </div>
                    <div class="stat-box">
                        <div class="progress-circle" style="width: 60px; height: 60px;">
                            <div class="circle-bg"></div>
                            <div class="circle" style="--progress: 60%"></div>
                            <div class="circle-inner" style="width: 40px; height: 40px; top: 10px; left: 10px;">3/5</div>
                        </div>
                        <h3>Water</h3>
                        <p>liters</p>
                    </div>
                </div>

                <!-- Featured Courses -->
                <div class="featured-courses">
                    <div class="section-title">
                        <h2>Featured Course</h2>
                        <a href="#">See all</a>
                    </div>
                    <div class="course-grid">
                        <div class="course-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/course1.jpg" alt="Course 1">
                            <p>Weight Lifting</p>
                            <button>Join Now</button>
                        </div>
                        <div class="course-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/course2.jpg" alt="Course 2">
                            <p>Muscle Training</p>
                            <button>Join Now</button>
                        </div>
                        <div class="course-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/course3.jpg" alt="Course 3">
                            <p>Muscle Bucket</p>
                            <button>Join Now</button>
                        </div>
                    </div>
                </div>

                <!-- Today's Plan -->
                <div class="today-plan">
                    <div class="section-title">
                        <h2>Today Plan</h2>
                        <a href="#">See all</a>
                    </div>
                    <div class="plan-grid">
                        <div class="plan-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/pushup.jpg" alt="Plan 1">
                            <div class="plan-details">
                                <p>Push Up</p>
                                <p>100 Push up a day</p>
                                <div class="progress-bar"><div style="width: 40%"></div></div>
                            </div>
                        </div>
                        <div class="plan-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/situp.jpg" alt="Plan 2">
                            <div class="plan-details">
                                <p>Sit Up</p>
                                <p>20 Sit up a day</p>
                                <div class="progress-bar"><div style="width: 60%"></div></div>
                            </div>
                        </div>
                        <div class="plan-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/knee.jpg" alt="Plan 3">
                            <div class="plan-details">
                                <p>Knee Push Up</p>
                                <p>20 Sit up a day</p>
                                <div class="progress-bar"><div style="width: 20%"></div></div>
                            </div>
                        </div>
                        <div class="plan-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/crunch.jpg" alt="Plan 4">
                            <div class="plan-details">
                                <p>Belly fat burner</p>
                                <p>20 Sit up a day</p>
                                <div class="progress-bar"><div style="width: 50%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="services">
                    <div class="section-title">
                        <h2>Services</h2>
                        <a href="#">See all</a>
                    </div>
                    <div class="service-grid">
                        <div class="service-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/ex-program.jpg" alt="Service 1">
                            <p>Exercise Program</p>
                        </div>
                        <div class="service-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/nutri.jpg" alt="Service 2">
                            <p>Nutrition Plans</p>
                        </div>
                        <div class="service-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/time.jpg" alt="Service 3">
                            <p>Practice Time</p>
                        </div>
                        <div class="service-card">
                            <img src="<?= ROOT ?>/assets/images/user/home/diet.jpg" alt="Service 4">
                            <p>Diet Program</p>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
      