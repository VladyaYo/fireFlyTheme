<div class="container">
	<section id="calculator" class="calculator">
		<div class="calculator-left">
			<h2 class="calculator-title">Bereken Jouw Energiebesparing</h2>
			<div class="calculator-top">
				<label class="imgRadio">
					<input class="imgRadio-check" type="radio" name="industry" value="Kantoor" checked>
					<div class="imgRadio-box">
						<span class="imgRadio-icon imgRadio-icon--kantoor"></span>
						Kantoor
					</div>
				</label>
				<label class="imgRadio">
					<input class="imgRadio-check" type="radio" name="industry" value="Winkel">
					<div class="imgRadio-box">
						<span class="imgRadio-icon imgRadio-icon--winkel"></span>
						Winkel
					</div>
				</label>
				<label class="imgRadio">
					<input class="imgRadio-check" type="radio" name="industry" value="Industrie">
					<div class="imgRadio-box">
						<span class="imgRadio-icon imgRadio-icon--industrie"></span>
						Industrie
					</div>
				</label>
				<div class="calculator-extraRadios">
					<label class="customRadio">
						<input class="customRadio-check" type="radio" name="industrie_type" value="TL Armatuur" checked>
						<span class="customRadio-box"></span>
						<span class="customRadio-text">TL Armatuur</span>
					</label>
					<label class="customRadio">
						<input class="customRadio-check" type="radio" name="industrie_type" value="High-Bay">
						<span class="customRadio-box"></span>
						<span class="customRadio-text">High-Bay</span>
					</label>
				</div>
			</div>
			<div class="calculator-basic">
				<span>Mijn bedrijf heeft een oppervlakte van</span>
				<label class="field">
					<input class="field-input" type="number" name="m2" value="0">
					<span class="field-text">m<sup>2</sup></span>
				</label>
				<span>of</span>
				<label class="field">
					<input class="field-input" type="number" name="lampen" value="0">
					<span class="field-text">lampen</span>
				</label>
			</div>
			<div class="calculator-extra">
				<div class="calculator-extraBtn">Uitgebreide gegevens</div>
				<div class="calculator-extraContent">
					<div class="calculator-line">
						<span>De lampen binnen mijn bedrijf branden</span>
						<div class="field">
							<select id="select-hours">
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8" selected>8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
							</select>
						</div>
						<span>uur per dag en</span>
						<div class="field">
							<select id="select-days">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5" selected>5</option>
								<option value="6">6</option>
								<option value="7">7</option>
							</select>
						</div>
						<span>dagen in de week.</span>
					</div>
					<div class="calculator-line">
						<span>Mijn energietarief is</span>
            <label class="field">
              <input class="field-input" type="number" name="price" value="0.22">
            </label>
						<span>per KwH.</span>
					</div>
				</div>
			</div>
		</div>
		<div class="calculator-right">
      <div class="calculator-results">
        <div class="result">
          <div class="result-icon result-icon--energy"></div>
          <div class="result-info">
            <p class="result-name">Energiebesparing</p>
            <p><span id="money-saving" class="result-number">€ 0</span> <span class="result-caption">Per Jaar</span></p>
          </div>
        </div>
        <div class="result">
          <div class="result-icon result-icon--co2"></div>
          <div class="result-info">
            <p class="result-name">C02 besparing</p>
            <p><span id="co2-saving" class="result-number">0</span> <span class="result-caption">Per Jaar</span></p>
          </div>
        </div>
        <div class="result">
          <div class="result-icon result-icon--tree"></div>
          <div class="result-info">
            <p class="result-name">You'll save trees </p>
            <p><span id="trees-saving" class="result-number">0</span> <span class="result-caption">Per Jaar</span></p>
          </div>
        </div>
      </div>
			<form class="form calculator-form wordpress-ajax-form" id="see" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
				<div class="form-group" >
          <input type="hidden" id="custom_action" name="action" value="custom_action">
					<input type="email" id="semail" name="email" required placeholder="Enter email">
          <button class="btn btn--full sendEmail" type="submit">Verstuur</button>
				</div>
        <p class="emailSent">
          Email is succesvol verzonden
        </p>
				<p class="form-caption">Wist u dat u ook kan besparen op onderhoud? Stuur de gehele besparing.</p>
			</form>
		</div>
	</section>
</div>