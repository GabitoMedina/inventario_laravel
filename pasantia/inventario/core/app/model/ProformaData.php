<?php
class ProformaData {
	public static $tablename = "person";


	public function ProformaData(){
		$this->identificacion = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add_client(){
		$sql = "insert into person (identificacion,name,lastname,address1,email1,phone1,kind,created_at) ";
		$sql .= "value (\"$this->identificacion\",\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->email1\",\"$this->phone1\",1,$this->created_at)";
		Executor::doit($sql);
	}

	// public function add_provider(){
	// 	$sql = "insert into person (name,lastname,address1,email1,phone1,kind,created_at,company, product_id,product_barcode) ";
	// 	// nuevo campo
	// 	$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->email1\",\"$this->phone1\",2,\"$this->created_at\",\"$this->company\",\"$this->product_id\",$this->product_barcode)";
	// 	Executor::doit($sql);
	// }

	public function add_provider(){
		$sql = "insert into person (identificacion,name,lastname,company,address1,email1,phone1,phone2,kind,created_at) ";
		$sql .= "value (\"$this->identificacion\",\"$this->name\",\"$this->lastname\",\"$this->company\",\"$this->address1\",\"$this->email1\",\"$this->phone1\",\"$this->phone2\",2,$this->created_at)";
		Executor::doit($sql);
	}

	// public function add_provider(){
	// 	$sql = "insert into person (name,lastname,address1,email1,phone1,kind,created_at) ";
	// 	// nuevo campo
	// 	$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->address1\",\"$this->email1\",\"$this->phone1\",2,\"$this->created_at)";
	// 	// \"$this->company\",\"$this->product_id\",$this->product_barcode
	// 	Executor::doit($sql);
	// }

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProformaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_client(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_provider(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email1=\"$this->email1\",address1=\"$this->address1\",lastname=\"$this->lastname\",phone1=\"$this->phone1\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProformaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->identificacion = $r['identificacion'];
			$data->name = $r['name'];
			$data->lastname = $r['lastname'];
			$data->company = $r['company'];
			$data->address1 = $r['address1'];
			$data->phone1 = $r['phone1'];
			$data->phone2= $r['phone2'];
			$data->email1 = $r['email1'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProformaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->identificacion = $r['identificacion'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->company = $r['company'];
			$array[$cnt]->email = $r['email1'];
			$array[$cnt]->username = $r['username'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getClients(){
		$sql = "select * from ".self::$tablename." where kind=1 order by name,lastname";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProformaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->identificacion = $r['identificacion'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getProviders(){
		$sql = "select * from ".self::$tablename." where kind=2 order by name,lastname";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProformaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->identificacion = $r['identificacion'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->lastname = $r['lastname'];
			$array[$cnt]->company = $r['company'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->phone2 = $r['phone2'];
			$array[$cnt]->address1 = $r['address1'];

			$array[$cnt]->created_at = $r['created_at'];
			// $array[$cnt]->company = $r['company'];
			$array[$cnt]->product_id = $r['product_id'];
			$array[$cnt]->product_barcode = $r['product_barcode'];
			$cnt++;
		}
		return $array;
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProformaData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->identificacion = $r['identificacion'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->address1 = $r['address1'];
			$array[$cnt]->email1 = $r['email1'];
			$array[$cnt]->phone1 = $r['phone1'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


}

?>
