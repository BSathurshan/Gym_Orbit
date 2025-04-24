
<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/mealview.css">
<div class="in-content">
    <div class="header">
        <h2>Meal Plan</h2>
    </div>

    <div class="in-in-content">
    <div class="mv-in-in-content">
        <div class="mv-goal-buttons">
            <p>SELECT YOUR GOAL</p>
            <button onclick="selectGoal('weight_loss')">Fat Loss </button>
            <button onclick="selectGoal('muscle_gain')">Muscle Gain </button>
            <button onclick="selectGoal('strength_training')">Maintenance </button>
        </div>

        <div id="meal-plan-container">
            <!-- Meal plans will be dynamically loaded here -->
        </div>
    </div>
</div>
</div>

<script>
function selectGoal(goal) {
    const mealPlans = {
        weight_loss: {
            title: "Fat Loss (Lean & Toned)",
            description: "Goal: Calorie deficit + high protein + fiber",
            plans: [
                {
                    type: "Non-Vegetarian Option",
                    meals: [
                        "Breakfast: Greek yogurt + handful of berries + 1 tbsp chia seeds",
                        "Snack: Boiled egg + green tea",
                        "Lunch: Grilled chicken breast + 1/2 cup brown rice + mixed salad (olive oil + lemon)",
                        "Snack: Apple + 10 almonds",
                        "Dinner: Grilled fish or tofu + steamed vegetables",
                        "Hydration: 2.5–3L water per day"
                    ]
                },
                {
                    type: "Vegetarian Option",
                    meals: [
                        "Breakfast: Oats with almond milk, banana, and flaxseeds",
                        "Snack: Low-fat paneer cubes or hummus with carrots",
                        "Lunch: Quinoa + rajma or chickpeas + cucumber salad",
                        "Snack: Coconut water + small handful of mixed seeds",
                        "Dinner: Tofu or soya stir-fry with broccoli and bell peppers"
                    ]
                }
            ]
        },
        muscle_gain: {
            title: "Muscle Gain (Bulk Cleanly)",
            description: "Goal: Calorie surplus + lots of protein + carbs around workouts",
            plans: [
                {
                    type: "Non-Vegetarian Option",
                    meals: [
                        "Breakfast: 4 boiled eggs + 2 slices whole grain bread + peanut butter",
                        "Snack: Protein shake + banana",
                        "Lunch: Chicken curry + white rice + dal + green veggies",
                        "Snack (Pre-workout): Toast + honey + black coffee",
                        "Post-workout: Whey protein + banana or dates",
                        "Dinner: Salmon or beef + mashed sweet potato + spinach",
                        "Before bed: Low-fat milk or casein protein"
                    ]
                },
                {
                    type: "Vegetarian Option",
                    meals: [
                        "Breakfast: Smoothie with banana, oats, peanut butter, whey, and almond milk",
                        "Snack: Boiled chickpeas with lime and onion",
                        "Lunch: Paneer curry + basmati rice + mixed veg",
                        "Snack (Pre-workout): Dates + walnuts + coffee",
                        "Post-workout: Whey shake + rice cake or banana",
                        "Dinner: Lentil stew + quinoa or roti + green salad",
                        "Before bed: Cottage cheese or soy milk"
                    ]
                }
            ]
        },
        strength_training: {
            title: "Maintenance (Healthy Balance)",
            description: "Goal: Balanced macros, enough fiber, flexible dieting",
            plans: [
                {
                    type: "Mix of Veg + Non-Veg",
                    meals: [
                        "Breakfast: Omelet with spinach + toast + orange juice",
                        "Snack: Greek yogurt + walnuts",
                        "Lunch: Grilled paneer/chicken wrap with veggies",
                        "Snack: Dark chocolate square + tea",
                        "Dinner: Lentil soup or grilled fish + salad + 1 roti",
                        "Dessert (sometimes): Fruit or 70% dark chocolate"
                    ]
                }
            ]
        }
    };

    const container = document.getElementById('meal-plan-container');
    container.innerHTML = '';

    if (mealPlans[goal]) {
        const goalData = mealPlans[goal];
        const card = document.createElement('div');
        card.className = 'mv-meal-plan-card';

        const title = document.createElement('h3');
        title.textContent = goalData.title;
        card.appendChild(title);

        const description = document.createElement('p');
        description.textContent = goalData.description;
        card.appendChild(description);

        goalData.plans.forEach(plan => {
            const planType = document.createElement('h4');
            planType.textContent = plan.type;
            card.appendChild(planType);

            const mealList = document.createElement('ul');
            plan.meals.forEach(meal => {
                const mealItem = document.createElement('li');
                mealItem.textContent = meal;
                mealList.appendChild(mealItem);
            });
            card.appendChild(mealList);
        });

        container.appendChild(card);
    } else {
        container.innerHTML = '<p>No meal plans available for this goal.</p>';
    }
}
</script>

