<form>
    <div class="form-group">
        <label>Vorname</label><br>
        <input type="text" value="Oliver"/><br>
    </div>
    <div class="form-group">
        <label>Nachname</label><br>
        <input type="text" value="Twist"/><br>
    </div>
    <div class="form-group">
        <label>Geboren</label><br>
        <input type="text" value="26.04.1993"/><br>
    </div>
    <div class="form-group">
        <label>Strasse</label><br>
        <input type="text" value="Rellstabstrasse 15"/><br>
    </div>
    <div class="form-group">
        <label>Wohnort</label><br>
        <input type="text" value="8041 Zürich"/><br>
    </div>
    <div class="form-group">
        <label>Telefonnummer</label><br>
        <input type="text" value="079 651 54 12"/><br>
    </div>
    <div class="form-group">
        <label>Email</label><br>
        <p>OliTwister@hotmail.com</p><br>
        <input type="text" placeholder="Neue Email" value=""/><br>
    </div>
    <div class="form-group">
        <label>Passwort</label><br>
        <input type="password" placeholder="neues Passwort"/><br>
        <input type="password" placeholder="neues Passwort wiederholen"/><br>
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
            </select><br><br>
        </div>
    <button type="submit" class="btn btn-primary">Änderungen speichern</button><br>
</form>
    <button class="btn btn-default">Benutzer deaktivieren</button>
