<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diferença na taxa de Mortes</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <label for="pais1">Selecione o País 1:</label>

    <select id="pais1"> </select>

    &nbsp

    <label for="pais2"> Selecione o País 2:</label>

    <select id="pais2"> </select>

    &nbsp

    <button id="btn" class="btn">

        ok

    </button>

    <div id="diferença_taxa">


    </div>

    <script>
        function selectFill(paises) {
            country1 = document.getElementById("pais1")
            country2 = document.getElementById("pais2")

            for (let i = 0; i < paises.length; i++) {
                let c1 = document.createElement("option")
                c1.text = paises[i];
                country1.appendChild(c1);
                let c2 = document.createElement("option")
                c2.text = paises[i];
                country2.appendChild(c2)
            }
        }

        fetch(`index.php?action=Country`)
            .then(res => {
                if (!res.ok) {

                    throw new Error(`erro encontrado`)
                } else {
                    return res.json()
                }
            })

            .then(data => {

                selectFill(data)
            })


        document.getElementById('btn').addEventListener('click', function() {
            let country1 = document.getElementById('pais1').value;
            let country2 = document.getElementById('pais2').value;

            deathRate(country1, country2)

        });

        function deathRate(pais1, pais2) {

            let deathRate1 = 0
            let deathRate2 = 0
            let somaMortos = 0
            let somaConfirmados = 0
            let totalDeathRate = 0

            fetch(`index.php?action=getInformation&pais=${pais1}`)
                .then(res => {
                    if (!res.ok) {

                        throw new Error(`erro encontrado`)
                    } else {
                        return res.json()
                    }
                })
                .then(data => {

                    for (let i in data) {

                        if (data.hasOwnProperty(i)) {
                            let item = data[i]

                            somaMortos += item.Mortos
                            somaConfirmados += item.Confirmados
                        }
                        if (somaConfirmados < 1) {
                            deathRate1 = 0
                        } else {
                            deathRate1 = somaMortos / somaConfirmados
                        }
                        deathRate1 = somaMortos / somaConfirmados
                    }

                    fetch(`index.php?action=getInformation&pais=${pais2}`)
                        .then(res => {
                            if (!res.ok) {

                                throw new Error(`erro encontrado`)
                            } else {
                                return res.json()
                            }
                        })
                        .then(data => {
                            somaMortos = 0
                            somaConfirmados = 0

                            for (let i in data) {

                                if (data.hasOwnProperty(i)) {
                                    let item = data[i]

                                    somaMortos += item.Mortos
                                    somaConfirmados += item.Confirmados
                                }

                                if (somaConfirmados < 1) {
                                    deathRate2 = 0
                                } else {
                                    deathRate2 = somaMortos / somaConfirmados
                                }

                                totalDeathRate = (deathRate1 - deathRate2)

                                let varList = document.getElementById("diferença_taxa")
                                varList.innerHTML = ""

                                if (totalDeathRate < 0) {
                                    varList.innerHTML = `<div class="grid-container"><p> 
        Diferença entre as Taxas dos países ${pais1} e ${pais2} = ${totalDeathRate.toFixed(4)}. Obs: país 2 tem uma taxa de morte maior que a do país 1
                        </p></div>`
                                } else if (totalDeathRate > 0) {
                                    varList.innerHTML = `<div class="grid-container"><p> 
        Diferença entre as Taxas dos países ${pais1} e ${pais2} = ${totalDeathRate.toFixed(4)}
        </p></div>`
                                } else if (totalDeathRate == 0) {
                                    varList.innerHTML = `<div class="grid-container"><p> 
        Diferença entre as Taxas dos países ${pais1} e ${pais2} = 0
        </p></div>`
                                }

                            }
                        })
                })

        }
    </script>


</body>

</html>