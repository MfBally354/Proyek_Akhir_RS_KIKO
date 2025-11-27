class Jadwal extends Model
{
    protected $fillable = ['dokter_id','hari','jam_mulai','jam_selesai'];

    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }
}
