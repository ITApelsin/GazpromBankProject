package ru.itapelsin.persistence;

import lombok.Getter;
import lombok.Setter;

import javax.persistence.Entity;

@Entity
@Getter
@Setter
public class Image extends AbstractEntity {
    byte[] src;
}
