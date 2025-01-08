<form action="index.php" method="POST" class="section">

  <div class="container">
    <div class="columns is-centered">
      <div class="column">

        <div class="field">
          <label for="total" class="label">Total Bill (EUR)</label>

          <div class="control">
            <input type="number" min="2" step="0.01" name="total" id="total" class="input" required>
          </div>
        </div>

        <div class="field">

          <label for="tip" class="label">Tip %</label>

          <div class="control">
            <input type="number" step="0.01" name="tip" id="tip" class="input">
          </div>
        </div>

        <div class="control mt-5">
          <button type="submit" class="button is-primary is-fullwidth has-text-weight-bold ">Calculate</button>
        </div>
      </div>
    </div>
  </div>

</form>