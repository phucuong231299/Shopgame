<?php
namespace App\helper;
class tuido{
    
    public $tuido=[];
    public $soluong=0;
    public $gia=0;

    public function __construct()
    {
        $this->tuido=session('tuido')?session('tuido'):[];
        $this->soluong=$this->tongsoluong();
        $this->gia=$this->tonggia();
    }
    public function them($sanpham, $soluong=1){
        $item=[
            'id'=>$sanpham->id,
            'tensp'=>$sanpham->tensp,
            'gia'=>$sanpham->giaxuat,
            'soluong'=>$soluong,
            'anh'=>$sanpham->anh,
           
        ];
        if(isset($this->tuido[$sanpham->id])){
            $this->tuido[$sanpham->id]['soluong']+=$soluong;
        }
        else{
            $this->tuido[$sanpham->id]=$item;
        }
        session(['tuido'=>$this->tuido]);
        
      
    }
    public function capnhattang($id, $soluong=1){
        if(isset($this->tuido[$id])){
            $this->tuido[$id]['soluong']+=$soluong;

        }
        session(['tuido'=>$this->tuido]);
    }

    public function capnhatgiam($id, $soluong=1){
        if(isset($this->tuido[$id])){
            $this->tuido[$id]['soluong']-=$soluong;
        }
        session(['tuido'=>$this->tuido]);
    }
    public function giamgia(tuido $tuido, $tien){
        
        $tuido->gia-=$tien;
        
        session(['tuido'=>$this->tuido]);
    }
    public function xoa($id){
        if(isset($this->tuido[$id])){
            unset($this->tuido[$id]);
        }
        session(['tuido'=>$this->tuido]);
    }
    public function xoatatca(){
        
        session()->forget('tuido');
    }
    public function tonggia(){
        $t=0;
        foreach($this->tuido as $item){
            $t+=$item['gia']*$item['soluong'];
        }
        return $t;
    }
   
    public function tongsoluong(){
        $t=0;
        foreach($this->tuido as $item){
            $t+=$item['soluong'];
        }
        return $t;
    }

}
?>