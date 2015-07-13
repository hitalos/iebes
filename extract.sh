#!/bin/bash
if [ "$1" == "" ]; then
	echo "Forneça um arquivo ZIP de backup!"	
	echo "$0 <church.zip>"
	exit 1;
fi

IMPORT='import.sql'
SQLITE='church11.sqlite'
mkdir tmp
unzip $1 -d tmp
cd tmp
iconv -f iso-8859-1 -t utf-8 church11.sql > $IMPORT
mv $IMPORT church.sql

FIRSTLINE=`awk '/INSERT INTO tblmembros/{ print NR; exit }' church.sql`
LASTLINE=`cat -n church.sql | grep 'INSERT INTO tblmembros' | tail -1 | cut -f1`

cat church.sql | head -n $LASTLINE | tail -n +$FIRSTLINE > $IMPORT

sed -i  -e 's/^.*INSERT/INSERT/' $IMPORT
sed -i  -e "s/\\\'/''/g" $IMPORT

echo "Limpando base de dados..."
rm ../$SQLITE

echo "Criando base de dados..."
echo ".read ../schema.sql" | sqlite3 ../$SQLITE

echo "Povoando base de dados..."
echo "PRAGMA journal_mode = MEMORY;
.read $IMPORT" | sqlite3 ../$SQLITE

cd ..
rm -rf tmp
