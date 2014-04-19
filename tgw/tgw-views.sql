
CREATE VIEW v_placename AS
SELECT pn.*, ftype.name_vn ftype_vn, ftype.name_alt ftype_alt, ftype.name_tr ftype_tr,
ftype.name_en ftype_en, snote.src_note_ref snote_ref, snote.full_text snote_text
FROM (placename pn JOIN ftype ON pn.ftype_id = ftype.id)
LEFT JOIN snote ON pn.snote_id = snote.id;

CREATE VIEW v_spelling AS
SELECT sp.*, script.name script, trsys.name trsys
FROM spelling sp, script, trsys
WHERE sp.script_id = script.id AND sp.trsys_id = trsys.id;