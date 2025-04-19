<div class="in-content"> 
    <div class="header">
        <div>
            <h3>Membership Report</h3>

            <p>Total Active Members: 
                <?= isset($membershipReport) && $membershipReport['found'] === 'yes' 
                    ? $membershipReport['active_members'] 
                    : "Data not available" ?>
            </p>

            <p>Total Instructors: 
                <?= isset($membershipReport) && $membershipReport['found'] === 'yes' 
                    ? $membershipReport['instructor_count'] 
                    : "Data not available" ?>
            </p>
        </div>
    </div>
</div>



