<form>
    <div class="form-group">
        <label>Vorname</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Nachname</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Geboren</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Strasse</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Wohnort</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Telefonnummer</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Email</label><br>
        <input type="text" required/><br>
    </div>
    <div class="form-group">
        <label>Passwort</label><br>
        <input type="password" placeholder="neues Passwort" required/><br>
        <input type="password" placeholder="neues Passwort wiederholen" required/><br>
    </div>
    <div class="form-group">
        <label>Position</label>
        <div id="dropDownPositions">
            <select class="form-control">
                <option>Fahrer</option>
                <option>Disponent</option>
                <option>Technischer Leiter</option>
                <?php
                if(1 == 1) {
                    echo "<option>Admin</option>";
                }
                ?>
            </select><br>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Benutzer erstellen</button>
</form>