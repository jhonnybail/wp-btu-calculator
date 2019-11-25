<style>
    .ar-form-input-block {
        margin-top: 10px;
    }

    .ar-form-button-block {
        margin-top: 20px;
    }

    .ar-result {
        display: none;
    }

    #ar-result-1-aparelho {
        display: none;
    }

    #ar-result-mais-aparelho {
        display: none;
    }

    .ar-result h3 {
        margin-top: 0px;
    }

    .ar-result a {
        cursor: pointer;
    }
</style>

<script>
    function calcule(m2, janelas, eletronicos, pessoas) {
        let btu = 0;
        let btus = [9000, 12000, 18000, 20000, 22000, 24000, 30000, 36000, 48000, 60000, 80000];

        for (let k = 100000; k <= 2000000; k += 20000)
            btus.push(k);

        btu += (m2 * 600);
        btu += (janelas * 200);
        btu += (eletronicos * 200);
        btu += (pessoas * 200);

        for (let option of btus) {
            if (btu <= option + 500) return option;
        }

        return btus[btus.length - 1];
    }

    function showResult() {
        let m2 = document.getElementById('ar-data-area').value;
        let janelas = document.getElementById('ar-data-janela').value;
        let eletronicos = document.getElementById('ar-data-eletronico').value;
        let pessoas = document.getElementById('ar-data-pessoa').value;
        let btu = calcule(m2, janelas, eletronicos, pessoas);

        document.getElementById('ar-form').style = 'display: none';
        document.getElementById('ar-result').style = 'display: block';
        document.getElementById("ar-result-btus").innerHTML = btu.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        if (btu > 80000)
            document.getElementById('ar-result-mais-aparelho').style = 'display: block';
        else
            document.getElementById('ar-result-1-aparelho').style = 'display: block';

    }

    function recalculate() {
        document.getElementById('ar-form').style = 'display: block';
        document.getElementById('ar-result').style = 'display: none';
        document.getElementById('ar-result-1-aparelho').style = 'display: none';
        document.getElementById('ar-result-mais-aparelho').style = 'display: none';
    }
</script>

<form method="post" onsubmit="showResult(); return false;" class="ar-form" name="ar-form" id="ar-form">

    <div class="ar-form-input-block">
        <label for="ar-data-area">Área do comôdo (m<sup>2</sup>): </label>
        <input type="number" name="area" id="ar-data-area" step="1" min="0" class="ar-form-input-area" required />
    </div>

    <div class="ar-form-input-block">
        <label for="ar-data-janela">Quantidade de Janelas: </label>
        <input type="number" name="janela" id="ar-data-janela" step="1" min="0" class="ar-form-input-janela" required />
    </div>

    <div class="ar-form-input-block">
        <label for="ar-data-eletronico">Quantidade de Equipamentos Eletrônicos: </label>
        <input type="number" name="eletronico" id="ar-data-eletronico" step="1" min="0" class="ar-form-input-eletronico" required />
    </div>

    <div class="ar-form-input-block">
        <label for="ar-data-pessoa">Quantidade de pessoas: </label>
        <input type="number" name="pessoa" id="ar-data-pessoa" step="1" min="0" class="ar-form-input-pessoa" required />
    </div>

    <div class="ar-form-button-block">
        <button type="submit" name="send" id="ar-button-send">Calcular</button>
    </div>

</form>

<div class="ar-result" id="ar-result">
    <p id="ar-result-1-aparelho">Seu ar condicionado ideal deve ter aproximadamente:</p>
    <p id="ar-result-mais-aparelho">Parece que você possui uma área muito grande, será necessário a instalação de mais aparelhos, totalizando o valor de:</p>
    <h3><span id="ar-result-btus"></span> <span>BTUs</span></h3>
    <p><a onclick="recalculate();">Recalcular</a></p>
</div>