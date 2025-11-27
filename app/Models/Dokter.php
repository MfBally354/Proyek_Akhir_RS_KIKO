class Dokter extends Model
{
    protected $fillable = ['nama','spesialis','kontak'];

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }
}
