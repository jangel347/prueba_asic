matrix_example = [[9,2,3,4],[5,6,7,8],[9,10,11,12],[13,14,15,16]]
function calc_matrix(matrix){
    if (matrix[0].length == matrix.length){
        console.log('Matriz cuadrada: OK');
        var diagonal1 = 0;
        var diagonal2 = 0;
        let i;
        for (i = 0; i < matrix.length; i++) {
            diagonal1 += matrix[i][i];
        }
        max_index = i-1;
        for (let x = 0; x < matrix.length; x++) {
            diagonal2 += matrix[x][max_index];
            max_index--;
        }
        console.log(diagonal1);
        console.log(diagonal2);

        return 'VALOR ABSOLUTO: '+Math.abs(diagonal1-diagonal2);
    } else {
        console.log('Matriz cuadrada: ERROR');
    }
}

calc_matrix(matrix_example);