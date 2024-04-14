<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Covid 19</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>

<body>
    <div id="panel">
        <fieldset>

            <label for="pais">Selecione o País:</label>
            <select id="pais">
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="Brazil">Brazil</option>
            </select>

            <button id="btn" class="btn">
                ok

            </button>

        </fieldset>

        <p id="somaMortos" style="width:100%; font-size: 1.1em; margin-left: -10px; margin-top:10px;"></p>

        <p id="somaConfirmados" style="width:100%; font-size: 1.15em; margin-left: -10px;"></p>

        <div id="lista_de_paises">


        </div>

        <script>
        document.getElementById('btn').addEventListener('click', function() {

            let selectCountry = document.getElementById('pais').value

            fetch(`index.php?action=getInformation&pais=${selectCountry}`)
                .then(res => {
                    if (!res.ok) {

                        throw new Error(`erro encontrado`)
                    } else {
                        return res.json()
                    }
                })
                .then(data => {
                    let somaMortos = 0
                    let somaConfirmados = 0

                    let varList = document.getElementById("lista_de_paises")
                    varList.innerHTML = ""

                    document.getElementById("somaMortos").innerHTML = ''

                    document.getElementById("somaConfirmados").innerHTML = ''

                    document.getElementById("rodape_data").innerHTML = ''

                    document.getElementById("rodape_pais").innerHTML = ''

                    for (let i in data) {

                        if (data.hasOwnProperty(i)) {
                            let item = data[i]

                            somaMortos += item.Mortos
                            somaConfirmados += item.Confirmados

                            varList.innerHTML += `<div class="grid-container"><p> 
                        ProvinciaEstado: ${item.ProvinciaEstado}<br />
                        Confirmados: ${item.Confirmados}<br />
                        Mortos: ${item.Mortos}<br />
                        </p></div>`
                        }
                    }

                    document.getElementById("somaMortos").innerHTML +=
                        `<fieldset>
                        Total de Mortes = ${somaMortos}
                        </fieldset>`

                    document.getElementById("somaConfirmados").innerHTML +=
                        `<fieldset>Total de Casos Confirmados = ${somaConfirmados}</fieldset>`

                    lastAcess()
                })
        });

        function lastAcess() {

            fetch(`index.php?action=getLastAcess`)

                .then(res => {

                    if (!res.ok) {

                        throw new Error(`erro encontrado`)
                    } else {
                        return res.json()
                    }
                })

                .then(data => {
                    data = JSON.parse(data)
                    let dateNew = data.data.replaceAll('-', ",").replaceAll(':', ',').replace(" ", ",")
                    dateNew = dateNew.split(',')
                    dateNew =
                        `${dateNew[2]}/${dateNew[1]}/${dateNew[0]} às ${dateNew[3]}:${dateNew[4]}:${dateNew[5]}`

                    document.getElementById("rodape_data").innerHTML =
                        `<p style="position:fixed;top: 725px;left: 75%; width:fit-content;  font-size: 0.8em;">Último acesso em ${dateNew}
                            </p>`

                    document.getElementById("rodape_pais").innerHTML =
                        `<p style="position:fixed; top: 755px;left: 78%; width:fit-content;  font-size: 0.8em;">Último país acessado: ${data.pais}
                           </p>`
                })
        }
        lastAcess()
        </script>

    </div>
    <footer>
        <div class="rodape">

            <p id="rodape_data">

            </p>

            <p id="rodape_pais">

            </p>
        </div>

    </footer>

</body>

</html>