function validasiInput(config,alias)
{
	var rules = {
		required : function (value){
			if(value =="" || value == null) return false;
			return true;
		},
		email : function (value){
			var emailRegex = /^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+.)+[a-zA-Z]{2,}$/;
			var valid = emailRegex.test(value);
			var allValid = rules.required(value) && valid;
			return allValid;
		}
	};
	var errorMessage = {
		required : "Kolom @value Tidak boleh kosong",
		email : "@value bukan email yang valid"
	}
	var buildErrMessage = function(rule,label){		
		var regLabel = /@value/;
		pesan = errorMessage[rule];
		var pesanPecah = pesan.split(' ');
		for (i in pesanPecah)
		{
			if(regLabel.test(pesanPecah[i])){
				pesanPecah[i]=label;
			}
		}
		pesan = pesanPecah.join(' ');
		return pesan;
	}
	var errBag={};

	for (i in config){
		var input = document.getElementById(i);
		var value = input.value;
		var label = alias[i];
		var rule = config[i];
		var isValid = rules[rule](value);

		if (!isValid){
			errBag[i]=buildErrMessage(rule,label);
		}
	}

	var nErr=0;
	for(i in errBag){nErr++}
	if(nErr>0)
	{
		return {
			valid : false,
			error : errBag
		}
	}
	else
	{
		return {valid:true}
	}
}